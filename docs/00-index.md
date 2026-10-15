---
type: note
created: 2026-09-26
updated: 2026-09-26
qmd: "00 index"
title: "Gdpr — indice della documentazione"
description: "Documentazione del modulo Gdpr: funzionalita del modulo."
module: Gdpr
tags: [gdpr, documentazione, modulo, laraxot]
repository: https://github.com/laraxot/module_gdpr_fila5
related:
  - ./00-index.md
  - ./index.md
  - ../../../../docs/wiki/audits/docs-redundancy-audit.md
issues: https://github.com/laraxot/module_gdpr_fila5/issues
discussions: https://github.com/laraxot/module_gdpr_fila5/discussions
status: stale
---

> Nota 2026-10-14 (docs-audit): Copia concorrente del vecchio 00-INDEX.md: indice canonico e' ora 00-INDEX.md (aggiornato 2026-10-14). Qui restano link a file inesistenti (consent-management.md, GSD_WORKFLOW.md, phpmd-report.txt) e l'etichetta 'PHPStan Level 10 Compliant' non riverificata. Contenuto non riscritto, verificare prima di usarlo.

# 📚 **Indice Documentazione Modulo Gdpr**

**Status**: ✅ PHPStan Level 10 Compliant
**Module Version**: 2.3.0

## 🎯 **Lettura Essenziale**
1. [README.md](./README.md) - Panoramica completa e Business Logic dei consensi.
2. [roadmap.md](./roadmap.md) - Qualità del codice e obiettivi di conformità.
3. [philosophy.md](./philosophy.md) - Privacy by Design e Commandment della compliance.

## 🏗️ **Compliance & Consensi**
- 🗳️ **Consent Management _(riferimento non presente nel repository, verificato 2026-10-14)_** - Gestione del ciclo di vita del consenso.
- 📜 **[Treatments Definition](./gdpr-module-overview.md)** - Configurazione dei trattamenti dati.
- 🕒 **[Audit Trail](./gdpr-pdf-reports.md)** - Generazione report e tracciabilità eventi.

## 📊 **Filament & UI**
- 🛡️ **[Gdpr Resources](./filament-resources-modulo-gdpr.md)** - Gestione trattamenti e consensi nell'admin panel.
- 🍪 **[Cookie Consent](./cookie-consent.md)** - Implementazione del banner e della preferenza cookie.

## 🧪 **Qualità e Sviluppo**
- ✅ **[PHPStan Level 10](./phpstan-analysis-gdpr.md)** - Statistiche di conformità e fix.
- 🔬 **[Testing Strategy](./testing.md)** - Approccio Pest per la verifica della compliance.
- 🧹 **PHPMD Analysis _(riferimento non presente nel repository, verificato 2026-10-14)_** - Risoluzione della complessità nei modelli di privacy.

## 📦 **Pacchetti Composer**
- [Riferimento composer packages](../../../../bashscripts/ai/wiki/memories/composer-packages-reference.md)
- `statikbe/laravel-cookie-consent` - Banner cookie consent

## 📊 Documenti Product & Development

### Product
| File | Scopo |
|------|-------|
| [PRD.md](./prd.md) | Product Requirements |
| [PRODUCT_ROADMAP.md](./PRODUCT_ROADMAP.md) | Roadmap |
| [PRODUCT_STRATEGY.md](./PRODUCT_STRATEGY.md) | Strategy |
| [PRODUCT_LAUNCH_PLAN.md](./PRODUCT_LAUNCH_PLAN.md) | Launch Plan |

### Development
| File | Scopo |
|------|-------|
| GSD_WORKFLOW.md _(riferimento non presente nel repository, verificato 2026-10-14)_ | GSD Workflow |
| [SPRINT_PLANNING.md](./SPRINT_PLANNING.md) | Sprint Planning |
| [USER_RESEARCH.md](./USER_RESEARCH.md) | User Research |

## 🔗 **Moduli Correlati**
- [User](../../User/docs/README.md) - Soggetti dei consensi.
- [Activity](../../Activity/docs/README.md) - Log di sistema integrato.
- [Xot](../../Xot/docs/README.md) - Base framework e trait UUID.
# Documentation Index
- [AGENTS.md](../../../../AGENTS.md) - Project guidelines

---
*Documentazione conforme agli standard Laraxot - DRY + KISS + SOLID*

## Dependency Intelligence

- [Dependency intelligence](dependency-intelligence.md)