---
title: PHPStan Gdpr, test riespansi dal pull
type: story
module: Gdpr
phase: implementazione, quality gate
status: done
created: 2026-10-20
updated: 2026-10-20
tags: [phpstan, test, pull, gdpr]
related:
  - ../../../Xot/docs/stories/phpstan-test-wave-regression.story.md
  - phpstan-cleanup-gdpr.story.md
  - phpstan-Gdpr-fix.md
---

# PHPStan Gdpr: test riespansi dal pull

Lane `gdpr-lang-ai` del run PHPStan del 2026-10-20. Coordinamento, regole di lane e scala delle decisioni: [phpstan-test-wave-regression.story.md](../../../Xot/docs/stories/phpstan-test-wave-regression.story.md).

## Misura

- Baseline delle 09:00: 240 errori in 9 file (`tests/Pest.php` 24, `tests/TestCase.php` 1, `GdprBusinessLogicTest` 182, `GdprConsentTest` 19, `BaseModelTest` 4, `ConflictResolutionTest` 4, `conflictresolutiontest` 4, `Auth/RegisterPageTest` 1, `DeleteAccountAction` 1).
- La ri-misura prima di toccare e' stata interrotta da un `Internal error: Class Modules\Gdpr\Models\GdprConsent was not found` su `GdprConsentTest.php`: PHPStan non completa l'analisi finche' un file cita un SUT che non esiste.
- Dopo: 0 errori sui 9 file. Controllo esteso ai 43 file di `tests/` e a tutti i file di `app/`, `routes/`, `database/` (batch da 8 file): 0 errori.

## Scopo capito

Il modulo registra consensi (`Consent`), trattamenti (`Treatment`), eventi di audit (`Event`) e profili (`Profile`). I test devono garantire che questi quattro model reali si creino, si colleghino e rispettino i campi della tabella. `tests/Pest.php` lega Pest a `Modules\Gdpr\Tests\TestCase` e carica gli helper di `PestHelpers.php` e `PestStubs.php` (`gdprAssertDatabaseAvailable()`, `assertGdprTableHas()`). `TestCase` estende `XotBaseTestCase` con `DatabaseTransactions`, e offre `assertDatabaseHasRow`, `expectApplicationException`, `uniqueTreatmentName`.

## Causa

Il commit `82efe7d` del repo del modulo (2026-10-20 09:03, sync del pull) ha sovrascritto 7 file con le bozze di `laraxot/dev`, anteriori al ciclo PHPStan chiuso l'8 ottobre:

- `Pest.php` definiva helper e expectation (`createGdprConsent()`, `toBeGdprConsent()`, `createGdprRequest()`) su `Modules\Gdpr\Models\GdprConsent` e `GdprRequest`, che non esistono. Neppure `GdprDataExport` e `GdprDataDeletion`, usati da `GdprBusinessLogicTest`, esistono: `rg` su `app/` non trova nessuna delle quattro classi. Erano specifiche fantasma.
- `TestCase.php` era uno stub di 45 righe su `Illuminate\Foundation\Testing\TestCase` con `module:seed`, senza gli helper che gli altri test chiamano.
- `GdprBusinessLogicTest.php` (479 righe) pilotava i quattro model fantasma via `::factory()`: da solo 182 errori (`class.notFound`, `property.nonObject`, `method.nonObject` su `mixed`).

Non sono stati inventati modelli, tabelle o migration.

## Correzione

I blob pre-pull (verificati a 0 errori l'8 ottobre, identici a `a02dd4c` del 2026-10-08) sono stati riscritti su file con `git show cb7ded6:<path>`, dopo gate lock e mtime, senza `checkout` ne' `restore`. `cb7ded6` e' il merge del 2026-10-13 13:23, padre di `82efe7d`.

| File (sotto `Modules/Gdpr/`) | Righe prima | Righe dopo |
|---|---|---|
| `tests/Pest.php` | 66 | 21 |
| `tests/TestCase.php` | 45 | 90 |
| `tests/Feature/GdprBusinessLogicTest.php` | 479 | 393 |
| `tests/Unit/Models/GdprConsentTest.php` | 50 | 47 |
| `tests/Unit/Models/BaseModelTest.php` | 40 | 42 |
| `tests/Feature/ConflictResolutionTest.php` | 25 | 28 |
| `tests/Feature/conflictresolutiontest.php` | 25 | 25 |

Sorgenti toccati, perche' il resto (1 errore) nasceva li:

- `app/Actions/Account/DeleteAccountAction.php` (arrivato col pull): `Auth::user()` e' tipizzato da Larastan come `Modules\Quaeris\Models\User`, mentre `execute()` chiedeva `Modules\User\Models\User`. I due model sono fratelli: estendono entrambi `BaseUser`. L'action usa solo `id`, `getMorphClass()`, `deleted_at`, `deleted_by` e `save()`, tutti dichiarati su `BaseUser`. Parametro portato a `BaseUser` in `execute()` e `recordDeletionConsent()`.
- `app/Actions/Consent/RevokeGdprConsentsAction.php`: stesso parametro portato a `BaseUser`; l'unico chiamante e' `DeleteAccountAction`.

## Controprova

- `rg -P "Models\\\\Gdpr(Consent|Request|DataExport|DataDeletion)\b|GdprConsent::|GdprRequest::" tests app`: nessun risultato.
- `php -l` sui 9 file: nessun errore di sintassi.
- Pest non e' stato eseguito: il DB di test `quaeris_data_test` non esiste. La verifica e' PHPStan piu' lint.

## Non fatto e decisioni aperte

- `TestCase` verificato dell'8 ottobre usa `prepareSharedSqliteForTesting()` di `XotBaseTestCase` e `$connectionsToTransact = ['sqlite']`, in tensione con la regola di progetto "test su MySQL, mai sqlite". E' lo stato verificato e non e' stato cambiato; la decisione e' del modulo Xot.
- `tests/Feature/conflictresolutiontest.php` e `ConflictResolutionTest.php` sono la stessa specifica con nomi che differiscono solo per le maiuscole, entrambi tracciati. Su un filesystem insensibile alle maiuscole collidono. Segnalato, non cancellato.
- `ConflictResolutionTest.php` ripristinato verifica che i costruttori dei model reali non abbiano parametri obbligatori e che `getFillable()` non sia vuoto. La versione del pull asseriva `toBeInstanceOf` su `new X` e `toBeArray` su un valore gia' tipizzato `array`: asserzioni che per costruzione non possono fallire, e che Pest segnala come ridondanti.
