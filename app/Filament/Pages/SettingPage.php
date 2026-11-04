<?php

declare(strict_types=1);

namespace Modules\Gdpr\Filament\Pages;

use Modules\Xot\Filament\Pages\BaseSettingPage;

/** Tenant settings entry point for Gdpr; no mutable settings are exposed yet. */
class SettingPage extends BaseSettingPage
{
    /**
     * @return array<string, object>
     */
    protected function getFormSchema(): array
    {
        return parent::getFormSchema();
    }
}
