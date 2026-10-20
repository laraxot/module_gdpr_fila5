---
title: "Gdpr: indice operativo"
type: index
status: active
created: 2026-09-26
updated: 2026-10-20
module: Gdpr
tags: [gdpr, index, docs, consensi]
qmd: "gdpr indice operativo consensi treatment registrazione cookie banner informativa limiti"
---

# Gdpr: indice operativo canonico

Percorso: `laravel/Modules/Gdpr/docs/`. Questo e' l'indice canonico (contratto `bmad-output/docs-architecture/module-theme-docs-contract.md`). Gli altri indici della cartella non sono canonici: `index.md` e' l'elenco per argomento, `00-index.md` e `INDEX.md` sono copie concorrenti segnate come superate (nessun file e' stato cancellato).

Identita', contenuto reale del codice e limiti sono in [README.md](./README.md). Qui si dichiara solo come leggere la cartella.


- [Banner dei cookie](./cookie-banner.md) - riferimento del banner, dell'inventario e della cookie policy (DCP-153); sostituisce i vecchi `cookie-consent*.md` e `cookiebar-integration.md`, segnati `stale`.
## Da leggere per primi

| Documento | Cosa dice |
|---|---|
| [README.md](./README.md) | Cosa il modulo fornisce e cosa NON fornisce, con prove del 2026-10-14 |
| [decision-log.md](./decision-log.md) | Decisioni indipendenti del modulo (una voce: riallineamento del 2026-10-08) |
| [stories/](./stories/) | Cronologia BMAD: DCP-135 (consensi in registrazione), DCP-136 (cookie), DCP-140 (diritti), DCP-141 (conservazione), DCP-142 (accountability), [PHPStan dopo il pull del 2026-10-20](./stories/phpstan-test-wave-gdpr.story.md) |
| [wiki/log.md](./wiki/log.md) | Registro datato delle verifiche sulla documentazione |
| [index.md](./index.md) | Elenco per argomento di tutta la cartella |

## Stato verificato delle promesse dei documenti

| Promessa nei docs | Esito | Prova (2026-10-14) |
|---|---|---|
| Consensi salvati alla registrazione | Codice presente, dati assenti | `Treatment` 0 righe, `Consent` 0 righe nel DB di sviluppo; il seeder `TreatmentsTableSeeder` non e' richiamato da `GdprDatabaseSeeder` |
| Listener `SaveGdprConsents` su `UserRegistered` | Non raggiunto | nessun `dispatch` dell'evento nel codice |
| Banner cookie | Spento nel tenant Fixcity | `config/local/fixcity/gdpr.php`: `cookie_banner_on => false` |
| Informativa privacy art. 13 | Non in questo modulo | letta da Fixcity (`GetPublishedPrivacyPolicyAction`); `routes/web.php` di Gdpr e' vuoto |
| Export dati, diritti dell'interessato, report PDF | Non implementati | nessuna Action in `app/Actions/`; `html2pdf` e `personal-data-export` non usati da `app/` |
| Registro trattamenti, DPIA, retention | Non implementati | tabella `treatments` vuota; le chiavi `retention`, `processing_register`, `data_subject_rights`, `security_measures`, `dpo` di `config/config.php` non sono lette da alcun codice (grep) |
| PHPStan livello 10 | Verificato il 2026-10-20 | 0 errori su `app/`, `routes/`, `database/`, `tests/` dopo il ripristino dei test riespansi dal pull: [phpstan-test-wave-gdpr.story.md](./stories/phpstan-test-wave-gdpr.story.md) |
| Suite Pest | Non e' prova di regressione | 68 passati e 186 falliti su DB usa-e-getta (`A facade root has not been set`) |

## Directory della cartella

| Percorso | Ruolo | Nota |
|---|---|---|
| `README.md`, `00-INDEX.md`, `index.md`, `decision-log.md` | canonico | ingressi del modulo |
| `stories/` | canonico (cronologia) | 18 file; non rinumerare ne' cancellare |
| `wiki/` | canonico per regole e concetti locali | 37 file; `wiki/log.md` e' il registro |
| `architecture/`, `models/`, `testing/`, `concepts/`, `consent/`, `packages/`, `_integration/` | riferimento tecnico | non riverificati riga per riga; vedi i documenti segnati stale sotto |
| `roadmap/`, `development/`, `tasks/` | piani | descrivono intenzioni, non lo stato del codice |
| `html2pdf/` | note sul pacchetto esterno | il modulo non lo usa |
| `raw/` | evidence immutabile | import grezzi, non modificare |
| `root-md-files/`, `merge-conflicts/`, `analysis/`, `performance/`, `agents/`, `bmad/`, `llm-wiki/`, `prompts/`, `investigation/`, `outputs/`, `charts/` | evidence e legacy | utili come storia, non come stato |
| 205 file `.md` nella radice di `docs/` | misto | molte coppie con nome uguale a meno di maiuscole e underscore (17 collisioni di maiuscole, 35 gruppi di nomi quasi uguali); il consolidamento e' DOC-004 e DOC-006, non ancora eseguito |

## Documenti segnati stale il 2026-10-14

Hanno `status: stale` e una nota datata sotto il frontmatter; il contenuto non e' stato riscritto.

- [gdpr-module-overview.md](./gdpr-module-overview.md): presenta come obiettivi raggiunti audit trail, diritti dell'interessato e automazione dell'informativa.
- [gdpr-pdf-reports.md](./gdpr-pdf-reports.md): descrive report PDF che nel modulo non esistono.
- [task-export-dati-utente.md](./task-export-dati-utente.md): segna come fatte Action ed integrazione di export che non esistono.
- [gdpr-compliance-roadmap.md](./gdpr-compliance-roadmap.md): elenca come esistenti classi che non ci sono.
- [user-registration-integration.md](./user-registration-integration.md): descrive un flusso a eventi che il codice non esegue.
- [testing.md](./testing.md) e [testing/testing.md](./testing/testing.md): gli esempi usano `Modules\Gdpr\Models\GdprRequest`, classe che non esiste (modelli reali: `Consent`, `Treatment`, `Event`, `Profile`). Segnalati il 2026-10-20, contenuto non riscritto.
- [coverage.md](./coverage.md): riporta un output di errore con `createGdprConsent()`, helper che apparteneva a una bozza dei test non piu' presente.

## Prodotto e sviluppo (bozze)

Documenti generati da modello, senza contenuto specifico verificato: [prd.md](./prd.md), [roadmap.md](./roadmap.md), [PRODUCT_ROADMAP.md](./PRODUCT_ROADMAP.md), [PRODUCT_STRATEGY.md](./PRODUCT_STRATEGY.md), [PRODUCT_LAUNCH_PLAN.md](./PRODUCT_LAUNCH_PLAN.md), [SPRINT_PLANNING.md](./SPRINT_PLANNING.md), [USER_RESEARCH.md](./USER_RESEARCH.md).

## Qualita' e test

- [phpstan-analysis-gdpr.md](./phpstan-analysis-gdpr.md) e [phpmd-report.md](./phpmd-report.md): report storici, non riverificati oggi.
- [testing/testing.md](./testing/testing.md): strategia di test; la suite reale ha 256 chiamate `it()`/`test()` in 37 file.

## Collegamenti fuori dal modulo

- Matrice di conformita' normativa del progetto: [Fixcity compliance](../../Fixcity/docs/compliance/01-matrice-conformita-normativa.md).
- Informativa privacy del tenant: [DCP-130](../../Fixcity/docs/stories/dcp-130-informativa-privacy-art13-e-pagina-servita.story.md).
- [User docs](../../User/docs/README.md): soggetti dei consensi e widget di registrazione.
- [Xot docs](../../Xot/docs/README.md): classi base e provider.
- Dipendenze: [dependency-intelligence.md](./dependency-intelligence.md).
