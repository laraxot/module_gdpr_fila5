---
title: "Gdpr Module Documentation"
type: documentation
tags: [module, documentation]
created: 2026-06-05
updated: 2026-09-17
---

# Modulo Gdpr

## Overview

Il modulo **Gdpr** fa parte dell'ecosistema Laraxot PTVX.

## Scopo

Conformità GDPR per l'app: raccolta e tracciamento dei consensi utente, con le relative
risorse Filament (`ConsentResource`, `TreatmentResource`, `ProfileResource`,
`EventResource`, disponibili anche nel cluster `Filament\Clusters\Profile`).

- **`Treatment`** — anagrafica dei trattamenti dati richiedibili (nome, descrizione,
  versione/URL del documento, `required`, `active`, `weight` per l'ordinamento).
- **`Consent`** — consenso espresso da un soggetto (`subject_id`) per un trattamento,
  con `type` e `accepted_at`; salvato da `SaveGdprConsentsAction` e
  `UpdateGdprConsentsAction`, raccolto in fase di registrazione da
  `CollectGdprConsentsAction` (vedi `app/Actions/`).
- **`Event`** — audit trail immutabile delle azioni sui consensi (`action`, `ip`,
  `payload` cifrato con `Crypt`), scritto dal listener `SaveGdprConsents`.
- **`Profile`** — profilo GDPR del soggetto, con i consensi/trattamenti collegati.
- Banner cookie: `GdprServiceProvider` registra `CookieConsentMiddleware`
  (pacchetto `statikbe/laravel-cookie-consent`) sul gruppo `web` quando
  `GdprData::cookie_banner_on` è attivo.

## Struttura

```
Gdpr/
├── app/
│   ├── Actions/       # Consent, Registration, Validation
│   ├── Console/Commands/
│   ├── Filament/      # Clusters, Forms, Pages, Resources, Widgets
│   ├── Http/          # Controllers, Livewire, Middleware, Requests
│   ├── Listeners/
│   ├── Models/         # Consent, Event, Profile, Treatment
│   └── Providers/
├── docs/
├── lang/
└── resources/
```

## Dipendenze

- [Xot Base](../Xot/docs/)
- [User Module](../User/docs/)

## Indice documentazione

Questo README è la panoramica di partenza. Per l'elenco completo e organizzato per
argomento di tutti i file sotto `docs/`, vedi **[index.md](./index.md)** — indice
canonico, mantenuto aggiornato (vedi anche `docs/stories/docs-index-audit.story.md`).
Non duplicare qui i link a singoli documenti: aggiungerli in `index.md`.

## Backlinks

- [Moduli correlati](../README.md)
