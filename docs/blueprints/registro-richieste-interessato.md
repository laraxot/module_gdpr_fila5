---
title: "Blueprint: registro delle richieste dell'interessato (GDPR artt. 15-22)"
type: blueprint
status: draft
created: 2026-10-14
updated: 2026-10-14
module: Gdpr
tags: [blueprint, filament, gdpr, diritti-interessato, dcp-140, dcp-178]
qmd: "blueprint filament registro richieste interessato data subject request accesso cancellazione portabilita scadenza un mese art 12 gdpr dpo gdpr::admin"
issues: []
discussions: []
related:
  - ../stories/dcp-140-diritti-dellinteressato-procedura-e-strumenti.story.md
  - ../stories/dcp-178-registrazione-e-disiscrizione-a-norma.story.md
  - ../register-widget.md
---

# Blueprint: registro delle richieste dell'interessato

Prodotto con la skill `planning-filament` di `filament/blueprint` 2.4.0 (Filament 5.10.1, Livewire 4.4.7, Laravel 13). E' una specifica per chi implementa: non contiene codice applicativo. **Stato: bozza con decisioni aperte.** La skill vieta di presentare come definitive le scelte su dati, conservazione e azioni distruttive: sono nella sezione 0 con un default proposto, non ancora approvato dal DPO.

## 0. Decisioni aperte (da chiudere prima di implementare)
| # | Domanda | Default proposto in questo piano | Cosa cambia se la risposta e' diversa |
|---|---|---|---|
| D1 | Chi gestisce le richieste? | Chi ha il permesso `data_subject_request.*` (ruolo `dpo`, assegnato a mano) | permessi e seeder |
| D2 | Chi registra una richiesta? | Solo il personale, da PEC, email, sportello o posta | con un modulo per il cittadino servono una pagina del front office e un limite ai tentativi (fase successiva, DCP-140) |
| D3 | La verifica dell'identita' e' obbligatoria per evadere? | Si: senza `identity_verified_at` non si puo' passare a `fulfilled` | regola R3 e relativo test |
| D4 | Proroga (art. 12 par. 3) | Ammessa fino a 3 mesi dal ricevimento, con motivazione obbligatoria | colonne `extended_until` e `extension_reason` |
| D5 | Per quanto tempo si conserva il registro? | Non si cancella mai nulla finche' il DPO non decide (DCP-141) | nessuna eliminazione prevista; se serve, un comando pianificato |
| D6 | Si registrano nome ed email del richiedente? | Si, come testo; `user_id` facoltativo | il registro contiene dati personali: va dichiarato nell'informativa |
| D7 | **Esecuzione** della cancellazione/anonimizzazione e destino delle segnalazioni | **Fuori da questo piano.** Il registro traccia e scadenza le richieste; non cancella nulla | vedi DCP-178, punto 4: `tickets.owner_id` e' NOT NULL e senza chiave esterna |

## 1. Commands
Eseguire dalla cartella `laravel/`, in quest'ordine. Il pannello e' `gdpr::admin` (path `gdpr/admin`). Verificato con `--help` il 2026-10-14: `module:make-model` accetta `--migration --policy --factory`, `make:filament-resource` accetta `--panel --soft-deletes --view`.
```bash
php artisan module:make-enum DataSubjectRequestType Gdpr --no-interaction
php artisan module:make-enum DataSubjectRequestStatus Gdpr --no-interaction
php artisan module:make-enum DataSubjectRequestChannel Gdpr --no-interaction
php artisan module:make-model DataSubjectRequest Gdpr --migration --factory --no-interaction
php artisan module:make-policy DataSubjectRequestPolicy Gdpr --no-interaction
php artisan make:filament-resource DataSubjectRequest --model-namespace='Modules\Gdpr\Models' --panel=gdpr::admin --view --no-interaction
```
Il generatore di Filament scrive in `app/Filament`: **spostare** la risorsa e le pagine in `Modules/Gdpr/app/Filament/Resources/DataSubjectRequestResource.php` e `.../DataSubjectRequestResource/{Pages,Schemas,Tables}/`, cambiando i namespace in `Modules\Gdpr\Filament\Resources\...` (stessa struttura di `ConsentResource`). La risorsa estende `Modules\Xot\Filament\Resources\XotBaseResource`, non `Filament\Resources\Resource`.

## 2. Models
### Enum `Modules\Gdpr\Enums\DataSubjectRequestType` (string, implementa `Filament\Support\Contracts\HasLabel`)
`access` (art. 15), `rectification` (16), `erasure` (17), `restriction` (18), `portability` (20), `objection` (21). Etichette in `Modules/Gdpr/lang/{it,en,de,es}/data_subject_request.php`, chiave `type.<valore>`.
### Enum `DataSubjectRequestStatus` (string, `HasLabel`, `HasColor`)
`received` (gray), `identity_check` (warning), `in_progress` (info), `fulfilled` (success), `refused` (danger), `withdrawn` (gray). Stati terminali: `fulfilled`, `refused`, `withdrawn`. Metodo `isTerminal(): bool`. Transizioni ammesse (metodo `canTransitionTo(self $to): bool`): `received` -> `identity_check`, `in_progress`, `refused`, `withdrawn`; `identity_check` -> `in_progress`, `refused`, `withdrawn`; `in_progress` -> `fulfilled`, `refused`, `withdrawn`; i terminali non cambiano.
### Enum `DataSubjectRequestChannel` (string, `HasLabel`)
`pec`, `email`, `in_person`, `postal`, `phone`.

### Model `Modules\Gdpr\Models\DataSubjectRequest`
Estende `Modules\Gdpr\Models\BaseModel` (connessione `gdpr`, database `fixcity_data`), `use HasUuids` come `Consent`. **Nessuna chiave esterna verso `users`**: `users` sta nel database `fixcity_user` (connessione `user`), una FK tra database diversi non e' applicabile.
| Attributo | Tipo colonna | Cast / note |
|---|---|---|
| `id` | uuid | `HasUuids` |
| `type` | string(20) | cast `DataSubjectRequestType` |
| `status` | string(20), default `received`, indice | cast `DataSubjectRequestStatus` |
| `channel` | string(20) | cast `DataSubjectRequestChannel` |
| `requester_name` | string(255) | |
| `requester_email` | string(191), nullable, indice | |
| `user_id` | string(36), nullable, indice | `users.id` e' `varchar(36)`; nessun vincolo |
| `received_at` | timestamp | cast `datetime` |
| `due_at` | timestamp, indice | cast `datetime`; calcolato, mai da form |
| `extended_until` | timestamp, nullable | cast `datetime` |
| `extension_reason` | text, nullable | |
| `identity_verified_at` | timestamp, nullable | cast `datetime` |
| `identity_verification_method` | string(255), nullable | |
| `assigned_to` | string(36), nullable | id utente |
| `completed_at` | timestamp, nullable | cast `datetime` |
| `outcome` | text, nullable | |
| `refusal_basis` | text, nullable | obbligatoria se `refused` |
| `notes` | text, nullable | |
Colonne di audit (`created_by`, `updated_by`, `deleted_at`, `deleted_by`): come le altre tabelle del modulo, le aggiunge `XotBaseMigration` (`Modules/Xot/app/Database/Migrations/XotBaseMigration.php`: `tableCreate()` riga 294, `tableUpdate()` riga 320, colonne di audit con `foreignIdFor` righe 366-385). Da non dichiarare a mano nella migrazione. Migrazione nello stile di `2024_01_01_000006_create_consents_table.php`: `return new class extends XotBaseMigration { protected ?string $model_class = DataSubjectRequest::class; ... }`, forward-only, con `hasColumn()` prima di aggiungere.
Relazioni: nessuna Eloquent verso `User` (database diverso); un accessor `getRequesterAttribute()` puo' fare `User::find($this->user_id)` se serve; non e' richiesto.

**Regola R1 (scadenza), unica fonte:** `due_at = received_at->copy()->addMonthNoOverflow()`. Termine effettivo: `extended_until ?? due_at`, esposto come attributo `effective_deadline` sul model. Un termine non si calcola mai altrove (tabella, filtro, widget, azioni usano questo attributo o l'espressione SQL `COALESCE(extended_until, due_at)`). **Perche' `addMonthNoOverflow()`** (provato con Carbon in questo progetto il 2026-10-14): `2026-01-31` con `addMonth()` da' `2026-03-03`, con `addMonthNoOverflow()` `2026-02-28`; `2026-03-31` da' `2026-05-01` contro `2026-04-30`; `2026-05-15` da' `2026-06-15` in entrambi i casi. Il termine di un mese non deve slittare oltre la fine del mese. Per la proroga massima: `2026-01-31` + 3 mesi con `addMonthsNoOverflow(3)` = `2026-04-30`. `due_at` si imposta nel metodo `booted()` (`saving`) quando `received_at` e' modificato.
**Regola R5 (proroga):** `extended_until` non oltre `received_at->copy()->addMonthsNoOverflow(3)`, e non prima di `due_at`; `extension_reason` obbligatoria quando `extended_until` e' valorizzato.

## 3. Resources
### `Modules\Gdpr\Filament\Resources\DataSubjectRequestResource`
- Command: vedi sezione 1. Location: `laravel/Modules/Gdpr/app/Filament/Resources/DataSubjectRequestResource.php`. Docs: https://filamentphp.com/docs/5.x/resources/overview
- `protected static ?string $model = DataSubjectRequest::class;`
- Pagine: `ListDataSubjectRequests` (`/`), `CreateDataSubjectRequest` (`/create`), `ViewDataSubjectRequest` (`/{record}`), `EditDataSubjectRequest` (`/{record}/edit`). Niente azione di eliminazione in nessuna pagina (nemmeno `DeleteAction`/`DeleteBulkAction`): il registro e' una prova.
- Etichette: navigation group `GDPR`, icona `heroicon-o-inbox-arrow-down`, label singolare/plurale da `lang`.

### Form (creazione e modifica) - `DataSubjectRequestResource\Schemas\DataSubjectRequestForm`
Colonne del form: 1 (`$schema->columns(1)`), con due `Section` a `columnSpanFull()`.
**Section "Richiedente"** (`Filament\Schemas\Components\Section`, https://filamentphp.com/docs/5.x/schemas/sections)
- `requester_name`: `Filament\Forms\Components\TextInput`, Docs https://filamentphp.com/docs/5.x/forms/text-input, Validation `required, string, max:255`, Config `->required()->maxLength(255)`.
- `requester_email`: `Filament\Forms\Components\TextInput`, Validation `nullable, email, max:191`, Config `->email()->maxLength(191)`.
- `user_id`: `Filament\Forms\Components\TextInput`, Validation `nullable, string, size:36`, Config `->maxLength(36)->helperText(...)` (id dell'account, se noto).
**Section "Richiesta"**
- `type`: `Filament\Forms\Components\Select`, Docs https://filamentphp.com/docs/5.x/forms/select, Validation `required, Rule::enum(DataSubjectRequestType::class)`, Config `->options(DataSubjectRequestType::class)->required()`.
- `channel`: `Filament\Forms\Components\Select`, Validation `required, Rule::enum(DataSubjectRequestChannel::class)`, Config `->options(DataSubjectRequestChannel::class)->required()`.
- `received_at`: `Filament\Forms\Components\DateTimePicker`, Docs https://filamentphp.com/docs/5.x/forms/date-time-picker, Validation `required, date, before_or_equal:now`, Config `->required()->default(now())->maxDate(now())->seconds(false)`. **Modificabile solo in creazione** (`->disabled(fn (string $operation): bool => $operation === 'edit')`): cambiare la data di ricevimento sposta il termine.
- `assigned_to`: `Filament\Forms\Components\TextInput`, Validation `nullable, string, size:36`.
- `extended_until` e `extension_reason`: visibili solo in modifica. `extended_until`: `Filament\Forms\Components\DateTimePicker`, Validation `nullable, date, after_or_equal:<due_at>, before_or_equal:<received_at + 3 mesi NoOverflow>` (regola R5 calcolata dal record, non dal client); `extension_reason`: `Filament\Forms\Components\Textarea`, Validation `required_with:extended_until, nullable, string, max:2000`.
- `notes`: `Filament\Forms\Components\Textarea`, Validation `nullable, string, max:5000`, Config `->rows(4)`.
**Il form NON contiene** `status`, `due_at`, `completed_at`, `identity_verified_at`, `identity_verification_method`, `outcome`, `refusal_basis`: si scrivono solo dalle azioni della sezione "Actions". I campi nascosti o disabilitati di Filament sono controllati dal client e non proteggono nulla: l'unico punto che scrive lo stato e' la `Action`, che autorizza e verifica la transizione sul server.

### Table - `DataSubjectRequestResource\Tables\DataSubjectRequestsTable`
Ordinamento predefinito: `->defaultSort('due_at', 'asc')`. Docs: https://filamentphp.com/docs/5.x/tables/overview
| Colonna | Componente | Config |
|---|---|---|
| `requester_name` | `Filament\Tables\Columns\TextColumn` | `->searchable()->sortable()` |
| `type` | `Filament\Tables\Columns\TextColumn` | `->badge()->sortable()` |
| `status` | `Filament\Tables\Columns\TextColumn` | `->badge()->sortable()` |
| `received_at` | `Filament\Tables\Columns\TextColumn` | `->dateTime('d/m/Y')->sortable()` |
| `effective_deadline` | `Filament\Tables\Columns\TextColumn` | `->state(fn (DataSubjectRequest $r) => $r->effective_deadline)->dateTime('d/m/Y')->color(fn (DataSubjectRequest $r): string => $r->isOverdue() ? 'danger' : 'gray')->sortable(query: fn (Builder $q, string $direction) => $q->orderByRaw('COALESCE(extended_until, due_at) '.$direction))` |
| `assigned_to` | `Filament\Tables\Columns\TextColumn` | `->toggleable(isToggledHiddenByDefault: true)` |
| `channel` | `Filament\Tables\Columns\TextColumn` | `->badge()->toggleable(isToggledHiddenByDefault: true)` |
Filtri (`Filament\Tables\Filters`):
- `status`: `SelectFilter`, `->options(DataSubjectRequestStatus::class)->multiple()`.
- `type`: `SelectFilter`, `->options(DataSubjectRequestType::class)`.
- `overdue`: `Filter`, label "In ritardo", `->query(fn (Builder $q): Builder => $q->whereNotIn('status', [terminali])->whereRaw('COALESCE(extended_until, due_at) < ?', [now()]))`. Solo colonne fisse nell'SQL, nessun input dell'utente.
`isOverdue()` sul model = non terminale e `effective_deadline` nel passato: stessa definizione del filtro (test di coerenza, sezione 6).

### Infolist (pagina View) - `Schemas\DataSubjectRequestInfolist`
`Filament\Schemas\Components\Section` "Richiedente" (`TextEntry` per `requester_name`, `requester_email`, `user_id`), "Termini" (`TextEntry` per `received_at`, `due_at`, `extended_until`, `extension_reason`, `effective_deadline`), "Esito" (`TextEntry` per `status` come badge, `identity_verified_at`, `identity_verification_method`, `completed_at`, `outcome`, `refusal_basis`, `notes`). Namespace `Filament\Infolists\Components\TextEntry`, Docs https://filamentphp.com/docs/5.x/infolists/text-entry.

### Actions (sulla pagina View e nella riga della tabella), namespace `Filament\Actions\Action`
Docs https://filamentphp.com/docs/5.x/actions/overview. Ogni azione: `->authorize('update')` (policy), visibile solo se la transizione e' ammessa (`->visible(fn (DataSubjectRequest $r): bool => $r->status->canTransitionTo(...))`), e il metodo che scrive rilegge il record e **rifiuta se la transizione non e' ammessa** (difesa lato server, non solo `visible`). Tutte chiamano un'unica `Spatie\QueueableAction` per non duplicare regole: `Modules\Gdpr\Actions\Request\TransitionDataSubjectRequestAction::execute(DataSubjectRequest $request, DataSubjectRequestStatus $to, array $data): DataSubjectRequest` (niente classi `*Service`).
1. **Verifica identita'** (`verify_identity`), Location: header della View + riga. Form: `identity_verification_method` `Select`/`TextInput` obbligatorio (max 255). Behavior: imposta `identity_verified_at = now()`, passa `received -> identity_check`. Visibilita': stato `received`.
2. **Prendi in carico** (`take_in_charge`), Behavior: `-> in_progress`, `assigned_to = auth()->id()`. Visibilita': `received` o `identity_check`.
3. **Evadi** (`fulfil`), `->requiresConfirmation()`. Form: `outcome` `Textarea` `required|string|max:5000`. Behavior: **blocca** (notifica di errore, nessuna scrittura, azione "halted") se `identity_verified_at` e' nullo (R3, D3); altrimenti `-> fulfilled`, `completed_at = now()`, `outcome`. Visibilita': `in_progress`.
4. **Rifiuta** (`refuse`), `->requiresConfirmation()`, `color('danger')`. Form: `refusal_basis` `Textarea` `required|string|max:5000` (art. 12 par. 4: motivi, diritto di reclamo al Garante e di ricorso giurisdizionale: testo di aiuto fisso). Behavior: `-> refused`, `completed_at = now()`.
5. **Ritirata dal richiedente** (`withdraw`), `->requiresConfirmation()`. Behavior: `-> withdrawn`, `completed_at = now()`.
Tutte le scritture avvengono in una transazione sulla connessione `gdpr`. Ogni transizione scrive una riga di attivita' (modulo `Activity`, se attivo) con vecchio e nuovo stato.

## 4. Authorization
Policy `Modules\Gdpr\Models\Policies\DataSubjectRequestPolicy extends GdprBasePolicy` (cartella e stile di `ConsentPolicy`: `hasPermissionTo('<modello>.<abilita>')`).
- `viewAny`, `view`: permesso `data_subject_request.viewAny` / `.view`.
- `create`: `data_subject_request.create`. `update` (modifica e tutte le azioni): `data_subject_request.update`.
- `delete`, `deleteAny`, `forceDelete`, `forceDeleteAny`, `restore`, `restoreAny`: **sempre `false`**. `GdprBasePolicy::before()` restituisce `true` al super admin per qualsiasi abilita' (confronto con `XotData::make()->super_admin`): la policy deve **sovrascrivere `before()`** e restituire `false` per queste abilita' prima di delegare a `parent::before()`, altrimenti il super admin potrebbe cancellare il registro.
- Permessi da creare (seeder del modulo, ruolo `dpo`): `data_subject_request.viewAny`, `.view`, `.create`, `.update`.
- Pannello: `->strictAuthorization()` nel provider `Modules/Gdpr/app/Providers/Filament/AdminPanelProvider.php` (oggi non impostato) fa lanciare un errore se manca un metodo di policy invece di aprire l'accesso; da valutare perche' cambia il comportamento delle risorse gia' presenti.

## 5. Widgets
`Modules\Gdpr\Filament\Widgets\DataSubjectRequestsOverview extends Filament\Widgets\StatsOverviewWidget` (namespace `Filament\Widgets\StatsOverviewWidget\Stat`), Docs https://filamentphp.com/docs/5.x/widgets/stats-overview. Tre `Stat`: "Aperte" (non terminali), "In scadenza entro 7 giorni", "In ritardo" (colore `danger` se > 0). Stesse definizioni di R1 e di `isOverdue()`. `canView()` rispetta `viewAny` della policy.

## 6. Tests
Pest, con gli helper di Filament verificati nel sorgente installato (`vendor/filament/actions/src/Testing/TestsActions.php`, `tables/src/Testing/*`): `callAction`, `assertActionHidden`, `assertActionVisible`, `assertActionHalted`, `assertActionDoesNotExist`, `filterTable`. **I test di `Modules/Gdpr/tests` non avviano l'applicazione: scrivere in `Modules/Fixcity/tests/Feature/Gdpr/DataSubjectRequestTest.php`** e usare `bash bashscripts/tools/pest-scratch-db.sh` (DB di prova, mai quello di sviluppo).
Casi con ingressi che discriminano (valori attesi derivati dalla norma, non dal codice):
1. **R1, fine mese:** `received_at = 2026-01-31` -> `due_at = 2026-02-28`; `2026-03-31` -> `2026-04-30`; `2026-05-15` -> `2026-06-15`. Con `addMonth()` i primi due casi darebbero `2026-03-03` e `2026-05-01`: il test deve fallire in quel caso.
2. **R1, salvataggio invariato:** aprire e salvare il form senza modifiche non cambia `due_at`; cambiare `received_at` (solo in creazione) lo ricalcola.
3. **R5:** `extended_until` oltre `received_at + 3 mesi` rifiutata; prima di `due_at` rifiutata; senza `extension_reason` rifiutata; valida -> `effective_deadline = extended_until`.
4. **Transizioni (asimmetrico):** da `fulfilled` nessuna azione e' visibile (`assertActionHidden` per le cinque); da `received` solo "Verifica identita'", "Prendi in carico", "Rifiuta", "Ritirata".
5. **R3:** "Evadi" con `identity_verified_at` nullo e' `assertActionHalted`, lo stato resta `in_progress`; dopo "Verifica identita'" riesce.
6. **Rifiuto:** senza `refusal_basis` errore di validazione sul campo; con il testo `status = refused` e `completed_at` valorizzato.
7. **Manomissione:** il form di modifica non ha il campo `status` (`assertFormFieldDoesNotExist('status')`) e una richiesta Livewire che prova a impostare `data.status` non cambia il record.
8. **Autorizzazione (asimmetrica):** senza permesso `viewAny` la lista risponde 403; con `data_subject_request.viewAny` ma senza `.update` le azioni sono nascoste; **il super admin non puo' eliminare** (`Gate::forUser($superAdmin)->denies('delete', $record)`), e nel registro non esiste nessuna azione di eliminazione.
9. **Coerenza filtro/colonna/widget:** su un insieme con una richiesta `fulfilled` scaduta, una `in_progress` scaduta e una `in_progress` nel termine, il filtro "In ritardo", `isOverdue()` e la statistica "In ritardo" danno lo stesso insieme (1 elemento).
10. **Audit:** una transizione lascia `updated_by` e una riga di attivita' (se il modulo Activity e' attivo).

## Verifiche fatte e non fatte
Fatte: esistenza e namespace dei componenti `Action`, `Select`, `TextInput`, `Textarea`, `DateTimePicker`, `TextColumn`, `SelectFilter`, `Filter`, `Section`, `TextEntry`, `StatsOverviewWidget`, `Stat`, contratti `HasLabel`, `HasColor`, `HasIcon` e helper di test nel sorgente installato (`vendor/filament/*`); opzioni dei comandi `module:make-model` e `make:filament-resource`; pannello `gdpr::admin`; tipi delle colonne `users.id` (`varchar(36)`), `consents.id` (`uuid`); comportamento di `GdprBasePolicy::before()`.
**Non fatte:** la ricerca nella documentazione (`search-docs` di Boost) non era raggiungibile in questa sessione (server MCP non connesso): gli URL `filamentphp.com/docs/5.x/...` seguono lo schema usato dalla skill e non sono stati aperti uno per uno; i nomi esatti dei metodi `->options(Enum::class)` e `->authorize()` sulle azioni vanno confermati nella documentazione 5.x prima di scrivere il codice. Il comportamento di `XotBaseResource` con risorse che usano `Schemas/` e `Tables/` e' stato dedotto da `ConsentResource`. Nessun codice e' stato scritto o eseguito per questo piano.
