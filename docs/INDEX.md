---
title: "INDEX"
type: index
tags: [documentation, gdpr, cookie, consent, legal]
created: 2026-09-26
updated: 2026-10-14
qmd: "gdpr modulo docs indice canonico cookie consenso legali privacy compliance"
status: stable
issues: []
discussions: []
---

# Gdpr: documentazione canonica

Indice aggiornato 2026-10-14 (DCP-165). Un solo file canonico per tema; i duplicati sono
marcati `superseded` o `stale`, non cancellati (regola BMAD).

## Canonici (SSoT)

| Tema | File | Stato |
|------|------|-------|
| Cookie bar / consenso | [cookie-banner.md](./cookie-banner.md) | stable |
| Scelta package consent | [consent-packages-research.md](./consent-packages-research.md) | stable |
| Modelli consenso | [consents.md](./consents.md) | stable |
| Termini e condizioni | [terms-conditions.md](./terms-conditions.md) | stable |
| Registrazione del cittadino (widget, prova dei consensi) | [register-widget.md](./register-widget.md) | stable |
| Diritto al cancellation / export | [task-export-dati-utente.md](./task-export-dati-utente.md) | stable |
| Roadmap compliance | [gdpr-compliance-roadmap.md](./gdpr-compliance-roadmap.md) | stable |
| Overview modulo | [module-gdpr.md](./module-gdpr.md) | stable |
| Cookie policy pagina | [cookie-consent.md](./cookie-consent.md) | stable |
| Integrazione cookiebar (superata) | [cookiebar-integration.md](./cookiebar-integration.md) | stale → cookie-banner.md |

## Duplicati da consolidare (non cancellare)

- `cookie-consent.md` → `cookie-consent.md`
- `cookie_consent.md` → `cookie-consent.md`
- `terms-and-conditions.md`, `terms-and-conditions-documentation-themes.md`, `terms-conditions-collegamenti-versioni.md` → `terms-conditions.md`
- `consent-packages-research-gdpr-legal.md` → `consent-packages-research.md`
- `cookiebar-integration.md` → `cookie-banner.md` (gia' segnata stale)

## Storie correlate

- [2026-10-14-dcp-153-cookiebar-integrata-nel-modulo-gdpr.story.md](./stories/dcp-153-cookiebar-integrata-nel-modulo-gdpr.story.md)
- [2026-10-14-dcp-156-pagine-legali-complete-a-norma.story.md](../../../Themes/Sixteen/docs/stories/dcp-156-pagine-legali-complete-a-norma.story.md)
- [2026-10-14-dcp-164-registrazione-consenso-obbligatorio-PA.story.md](./stories/dcp-164-registrazione-consenso-obbligatorio-PA.story.md)
- [2026-10-14-dcp-165-gdpr-docs-indice-canonico.story.md](./stories/dcp-165-gdpr-docs-indice-canonico.story.md)
- [2026-10-15-final-override-removal-gdpr-resources.story.md](./stories/final-override-removal-gdpr-resources.story.md)
- [2026-10-15-account-deletion-flash-translation.story.md](./stories/account-deletion-flash-translation.story.md)
- [dcp-178-registrazione-e-disiscrizione-a-norma.story.md](./stories/dcp-178-registrazione-e-disiscrizione-a-norma.story.md)

## Non toccare

- `app/Http/Controllers/` (regola no-controllers).
- `phpstan.neon` (sacro, solo utente).