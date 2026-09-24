---
title: "Gdpr — struttura architetturale"
module: Gdpr
topic: structure
updated: 2026-09-17
---

# Struttura del modulo Gdpr

Nota: il front-matter `canonical` precedente puntava a
`Themes/docs/shared-components/.gitkeep`, un percorso che non esiste nel
repository (`Themes/docs/` non è mai stato creato). Questo file è stato
riscritto con la struttura reale verificata su `Modules/Gdpr/app/`, invece di
restare un bridge rotto verso un file inesistente. Vedi anche la nota
"Themes/docs/shared-components inesistente" nel finding di questo audit.

```
Modules/Gdpr/app/
├── Actions/
│   ├── Consent/
│   ├── Registration/
│   └── Validation/
├── Console/Commands/
├── Datas/
├── Enums/
├── Filament/
│   ├── Clusters/
│   ├── Forms/
│   ├── Pages/
│   ├── Resources/        # ConsentResource, TreatmentResource, ProfileResource, EventResource
│   └── Widgets/
├── Http/
│   ├── Controllers/
│   ├── Livewire/
│   ├── Middleware/
│   └── Requests/
├── Listeners/
├── Models/
│   ├── Consent.php
│   ├── Event.php
│   ├── Profile.php
│   ├── Treatment.php
│   ├── Policies/
│   └── Traits/
├── Providers/
│   └── Filament/          # AdminPanelProvider
└── View/Components/
```

Modelli principali (`app/Models/`): `Consent`, `Event`, `Profile`, `Treatment`
(più `BaseModel`, `BaseMorphPivot`, `BasePivot`).

Risorse Filament (`app/Filament/Resources/`): `ConsentResource`,
`EventResource`, `ProfileResource`, `TreatmentResource`.

Per il resto della documentazione del modulo vedi [../index.md](../index.md).
