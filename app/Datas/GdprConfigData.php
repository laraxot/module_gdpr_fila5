<?php

declare(strict_types=1);

namespace Modules\Gdpr\Datas;

use Modules\Xot\Datas\Concerns\MakesFromTenantConfig;
use Spatie\LaravelData\Data;

/** Tenant configuration reserved for future Gdpr settings. */
class GdprConfigData extends Data
{
    use MakesFromTenantConfig;
}
