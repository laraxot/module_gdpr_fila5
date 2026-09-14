# Html2Pdf - Panoramica e Installazione

<<<<<<< .merge_file_wY0QwI
[![Module](https://img.shields.io/badge/Module-Html2Pdf - Panoramica e Installazione-8B0000.svg)]()
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
Questa sezione fornisce una panoramica generale della libreria Html2Pdf, le novità dell'ultima versione, le istruzioni per l'installazione e l'architettura di integrazione nel progetto.

**Menu di Navigazione:**
*   [Utilizzo Base e Layout](./usage.md)
*   [Guida agli Stili](./styling.md)
*   [Funzionalità Avanzate](./advanced.md)
*   [Integrazione con Laravel e Best Practices](./laravel.md)
*   [Configurazione della Sicurezza](./security.md)

---

## 📋 Panoramica

**Html2Pdf** è una libreria PHP per convertire HTML in PDF, utilizzata in Laraxot/PTVX per generare documenti PDF da template Blade. Basata su TCPDF, supporta PHP 7.2-8.4.

**Repository:** https://github.com/spipu/html2pdf
**Versione utilizzata:** ^5.2 → **Aggiornato a 5.3.3** (Giugno 2025)
**Licenza:** OSL-3.0

---

## 🆕 **Novità Versione 5.3.x (2025)**

### 🔒 **Security Service Avanzato**
Html2Pdf 5.3+ include un [servizio di sicurezza](./security.md) configurabile per proteggere da accessi non autorizzati.

### 📝 **Supporto Readonly Attributes**
Nuovo supporto per attributi `readonly` negli elementi input e textarea.

### 📄 **Classe html2pdf-same-page**
Previene la divisione di tabelle tra pagine multiple.

### 🎨 **CSS con Variabili di Pagina**
Utilizzo di `[[page_cu]]` nei nomi delle classi CSS.

### 🏷️ **Nuovi Tag HTML Supportati**
- `<strike>` - Testo barrato
- `<figure>` - Contenitori di figure

### 🔧 **Miglioramenti Tecnici**
- **PHP 8.4 Full Support**
- **TCPDF Updated**
- **Performance e Memory Usage migliorati**

---

## 🚀 Installazione e Configurazione

### Composer Installation
```bash
composer require spipu/html2pdf
```

### Dipendenze Richieste
```json
{
    "require": {
        "php": ">=7.2",
        "spipu/html2pdf": "^5.2",
        "tecnickcom/tcpdf": "^6.6"
    }
}
```

### Estensioni PHP Necessarie
```ini
extension=gd
extension=mbstring
```

---

## 🏗️ Architettura nel Progetto

### Struttura di Integrazione
```
Modules/Xot/
├── app/
│   ├── Actions/
│   │   ├── Pdf/
│   │   │   ├── GetPdfContentByRecordAction.php    # PDF da record
│   │   │   ├── ContentPdfAction.php               # PDF da HTML/view
│   │   │   ├── StreamDownloadPdfAction.php        # Download diretto
│   │   │   └── Engine/
│   │   │       ├── SpipuPdfByHtmlAction.php       # Engine spipu
│   │   │       └── SpatiePdfByHtmlAction.php      # Engine spatie
│   └── Datas/
│       └── PdfData.php                            # DTO PDF
```

### Engine Supportati
```php
enum PdfEngineEnum
{
    case SPIPU;    // spipu/html2pdf (default)
    case SPATIE;   // spatie/laravel-pdf (alternative)
}
```
>>>>>>> .merge_file_J3z7qt
