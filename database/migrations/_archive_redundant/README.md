# Migration archiviate (Gdpr)

<<<<<<< .merge_file_trDNC8
[![Module](https://img.shields.io/badge/Module-Migration archiviate (Gdpr)-8B0000.svg)]()
[![Laravel](https://img.shields.io/badge/Laravel-13-red?style=for-the-badge)](https://laravel.com/)](https://laravel.com/)
[![Filament](https://img.shields.io/badge/Filament-5-ffab00?style=for-the-badge)](https://filamentphp.com/)](https://filamentphp.com/)
[![PHP](https://img.shields.io/badge/PHP-8.4+-777BB4?style=for-the-badge)](https://php.net/)](https://php.net/)
[![PHP](https://img.shields.io/badge/PHP-8.4+-777BB4?style=for-the-badge)](https://php.net/)](https://phpstan.org/)
[![PSR-12](https://img.shields.io/badge/Code-PSR--12-blue?style=for-the-badge)](https://www.php-fig.org/psr/psr-12/)](https://www.php-fig.org/psr/psr-12/)
[![Architecture](https://img.shields.io/badge/Architecture-Modular-purple?style=for-the-badge)](https://martinfowler.com/articles/paradigm-shifts.html)]()
]()

> **Core module for the FixCity Platform.**

## Perché esiste

Core module for the FixCity Platform.

## Superpoteri

- Modular component with XotBase patterns
- Professional-grade implementation
- Integrated with FixCity Platform

## Documentazione

| Lingua | Link |
|--------|------|
| 🇮🇹 Presentazione | Questo file (`README.md`) |
| 🇬🇧 Business card | [docs/readme-en.md](./docs/readme-en.md) |
| 📚 Wiki tecnica | [./docs/wiki/](./docs/) |

---

**Modulo** `Gdpr` · **Laraxot** · **FixCity Platform** · PHPStan 10 · Filament 5
=======
Migration storiche per `consents` — **non eseguire** su nuovo ambiente.

## Tabella `consents`

| Stato | File |
|-------|------|
| **Canonica** | `../2024_01_01_000005_create_consents_table.php` |
| Archiviate | `2024_01_01_000001` (connection `gdpr` legacy), `2024_01_01_000002` (CREATE parziale) |

La canonica referenzia `Consent::class`, morph `user`, `type`, `accepted_at`, `ip_address`, `user_agent`, soft delete.
>>>>>>> .merge_file_TmlEvH
