<?php

declare(strict_types=1);

namespace Modules\Gdpr\Filament\Pages;

use Filament\Forms\Components\TextInput;
use Modules\Gdpr\Datas\GdprConfigData;
use Modules\Xot\Filament\Pages\BaseSettingPage;

/**
 * Impostazioni di Gdpr, solo super-admin: durata della scelta sui cookie e pagina della cookie policy.
 *
 * @see GdprConfigData
 */
class SettingPage extends BaseSettingPage
{
/**
     * @return array<string, object>
     */
    protected function getFormSchema(): array
    {
        return [
            'enabled' => Toggle::make('enabled')->default(true)->required(),
            'consent_lifetime' => TextInput::make('consent_lifetime')
                ->numeric()
                ->integer()
                ->minValue(180)
                ->required(),
            'policy_path' => TextInput::make('policy_path')
                ->required()
                ->startsWith('/')
                ->maxLength(255),
        ];
    }
}
