<?php

declare(strict_types=1);

namespace Modules\Gdpr\Datas;

use Livewire\Wireable;
<<<<<<< HEAD
use Modules\Tenant\Actions\Config\GetTenantConfigArrayAction;
=======
use Modules\Tenant\Services\TenantService;
>>>>>>> 12e4ae8 (chore: remove obsolete configuration and documentation files)
use Spatie\LaravelData\Concerns\WireableData;
use Spatie\LaravelData\Data;

/**
 * Class MetatagData.
 *
 * @property string                                                          $title
 * @property string                                                          $sitename
 * @property string                                                          $subtitle
 * @property string|null                                                     $generator
 * @property string                                                          $charset
 * @property string|null                                                     $author
 * @property string|null                                                     $description
 * @property string|null                                                     $keywords
 * @property string                                                          $nome_regione
 * @property string                                                          $nome_comune
 * @property string                                                          $site_title
 * @property string                                                          $logo
 * @property string                                                          $logo_square
 * @property string                                                          $logo_header
 * @property string                                                          $logo_header_dark
 * @property string                                                          $logo_height
 * @property string                                                          $logo_footer
 * @property string                                                          $logo_alt
 * @property string                                                          $hide_megamenu
 * @property string                                                          $hero_type
 * @property string                                                          $facebook_href
 * @property string                                                          $twitter_href
 * @property string                                                          $youtube_href
 * @property string                                                          $fastlink
 * @property string                                                          $color_primary
 * @property string                                                          $color_title
 * @property string                                                          $color_megamenu
 * @property string                                                          $color_hamburger
 * @property string                                                          $color_banner
 * @property string                                                          $favicon
 * @property string                                                          $title
 * @property string                                                          $sitename
 * @property string                                                          $subtitle
 * @property string|null                                                     $generator
 * @property string                                                          $charset
 * @property string|null                                                     $author
 * @property string|null                                                     $description
 * @property string|null                                                     $keywords
 * @property string                                                          $nome_regione
 * @property string                                                          $nome_comune
 * @property string                                                          $site_title
 * @property string                                                          $logo
 * @property string                                                          $logo_square
 * @property string                                                          $logo_header
 * @property string                                                          $logo_header_dark
 * @property string                                                          $logo_height
 * @property string                                                          $logo_footer
 * @property string                                                          $logo_alt
 * @property string                                                          $hide_megamenu
 * @property string                                                          $hero_type
 * @property string                                                          $facebook_href
 * @property string                                                          $twitter_href
 * @property string                                                          $youtube_href
 * @property string                                                          $fastlink
 * @property string                                                          $color_primary
 * @property string                                                          $color_title
 * @property string                                                          $color_megamenu
 * @property string                                                          $color_hamburger
 * @property string                                                          $color_banner
 * @property string                                                          $favicon
 * @property string                                                          $title
 * @property string                                                          $sitename
 * @property string                                                          $subtitle
 * @property string|null                                                     $generator
 * @property string                                                          $charset
 * @property string|null                                                     $author
 * @property string|null                                                     $description
 * @property string|null                                                     $keywords
 * @property string                                                          $nome_regione
 * @property string                                                          $nome_comune
 * @property string                                                          $site_title
 * @property string                                                          $logo
 * @property string                                                          $logo_square
 * @property string                                                          $logo_header
 * @property string                                                          $logo_header_dark
 * @property string                                                          $logo_height
 * @property string                                                          $logo_footer
 * @property string                                                          $logo_alt
 * @property string                                                          $hide_megamenu
 * @property string                                                          $hero_type
 * @property string                                                          $facebook_href
 * @property string                                                          $twitter_href
 * @property string                                                          $youtube_href
 * @property string                                                          $fastlink
 * @property string                                                          $color_primary
 * @property string                                                          $color_title
 * @property string                                                          $color_megamenu
 * @property string                                                          $color_hamburger
 * @property string                                                          $color_banner
 * @property string                                                          $favicon
 * @property string                                                          $title
 * @property string                                                          $sitename
 * @property string                                                          $subtitle
 * @property string|null                                                     $generator
 * @property string                                                          $charset
 * @property string|null                                                     $author
 * @property string|null                                                     $description
 * @property string|null                                                     $keywords
 * @property string                                                          $nome_regione
 * @property string                                                          $nome_comune
 * @property string                                                          $site_title
 * @property string                                                          $logo
 * @property string                                                          $logo_square
 * @property string                                                          $logo_header
 * @property string                                                          $logo_header_dark
 * @property string                                                          $logo_height
 * @property string                                                          $logo_footer
 * @property string                                                          $logo_alt
 * @property string                                                          $hide_megamenu
 * @property string                                                          $hero_type
 * @property string                                                          $facebook_href
 * @property string                                                          $twitter_href
 * @property string                                                          $youtube_href
 * @property string                                                          $fastlink
 * @property string                                                          $color_primary
 * @property string                                                          $color_title
 * @property string                                                          $color_megamenu
 * @property string                                                          $color_hamburger
 * @property string                                                          $color_banner
 * @property string                                                          $favicon
 * @property string                                                          $title
 * @property string                                                          $sitename
 * @property string                                                          $subtitle
 * @property string|null                                                     $generator
 * @property string                                                          $charset
 * @property string|null                                                     $author
 * @property string|null                                                     $description
 * @property string|null                                                     $keywords
 * @property string                                                          $nome_regione
 * @property string                                                          $nome_comune
 * @property string                                                          $site_title
 * @property string                                                          $logo
 * @property string                                                          $logo_square
 * @property string                                                          $logo_header
 * @property string                                                          $logo_header_dark
 * @property string                                                          $logo_height
 * @property string                                                          $logo_footer
 * @property string                                                          $logo_alt
 * @property string                                                          $hide_megamenu
 * @property string                                                          $hero_type
 * @property string                                                          $facebook_href
 * @property string                                                          $twitter_href
 * @property string                                                          $youtube_href
 * @property string                                                          $fastlink
 * @property string                                                          $color_primary
 * @property string                                                          $color_title
 * @property string                                                          $color_megamenu
 * @property string                                                          $color_hamburger
 * @property string                                                          $color_banner
 * @property string                                                          $favicon
 * @property string                                                          $title
 * @property string                                                          $sitename
 * @property string                                                          $subtitle
 * @property string|null                                                     $generator
 * @property string                                                          $charset
 * @property string|null                                                     $author
 * @property string|null                                                     $description
 * @property string|null                                                     $keywords
 * @property string                                                          $nome_regione
 * @property string                                                          $nome_comune
 * @property string                                                          $site_title
 * @property string                                                          $logo
 * @property string                                                          $logo_square
 * @property string                                                          $logo_header
 * @property string                                                          $logo_header_dark
 * @property string                                                          $logo_height
 * @property string                                                          $logo_footer
 * @property string                                                          $logo_alt
 * @property string                                                          $hide_megamenu
 * @property string                                                          $hero_type
 * @property string                                                          $facebook_href
 * @property string                                                          $twitter_href
 * @property string                                                          $youtube_href
 * @property string                                                          $fastlink
 * @property string                                                          $color_primary
 * @property string                                                          $color_title
 * @property string                                                          $color_megamenu
 * @property string                                                          $color_hamburger
 * @property string                                                          $color_banner
 * @property string                                                          $favicon
 * @property string                                                          $title
 * @property string                                                          $sitename
 * @property string                                                          $subtitle
 * @property string|null                                                     $generator
 * @property string                                                          $charset
 * @property string|null                                                     $author
 * @property string|null                                                     $description
 * @property string|null                                                     $keywords
 * @property string                                                          $nome_regione
 * @property string                                                          $nome_comune
 * @property string                                                          $site_title
 * @property string                                                          $logo
 * @property string                                                          $logo_square
 * @property string                                                          $logo_header
 * @property string                                                          $logo_header_dark
 * @property string                                                          $logo_height
 * @property string                                                          $logo_footer
 * @property string                                                          $logo_alt
 * @property string                                                          $hide_megamenu
 * @property string                                                          $hero_type
 * @property string                                                          $facebook_href
 * @property string                                                          $twitter_href
 * @property string                                                          $youtube_href
 * @property string                                                          $fastlink
 * @property string                                                          $color_primary
 * @property string                                                          $color_title
 * @property string                                                          $color_megamenu
 * @property string                                                          $color_hamburger
 * @property string                                                          $color_banner
 * @property string                                                          $favicon
 * @property array<string, array{key?: string, color: string, hex?: string}> $colors
 *
 * @method string getBrandLogoBase64() Get the brand logo as base64 data URI for inline embedding
 */
class GdprData extends Data implements Wireable
{
    use WireableData;

    public bool $cookie_banner_on = true;

    /**
     * Singleton instance.
     */
    private static ?self $instance = null;

    /**
     * Creates or returns the singleton instance.
     */
    public static function make(): self
    {
        if (! self::$instance) {
            /** @var array<string, mixed> $data */
<<<<<<< HEAD
            $data = app(GetTenantConfigArrayAction::class)->execute('gdpr');
=======
            $data = TenantService::getConfig('gdpr');
>>>>>>> 12e4ae8 (chore: remove obsolete configuration and documentation files)
            self::$instance = self::from($data);
        }

        return self::$instance;
    }
}
