<?php

declare(strict_types=1);

namespace Modules\Gdpr\Filament\Resources;

use Modules\Gdpr\Models\Consent;
use Modules\Xot\Filament\Resources\XotBaseResource;

class ConsentResource extends XotBaseResource
{
    protected static ?string $model = Consent::class;
}
