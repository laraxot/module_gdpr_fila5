<?php

declare(strict_types=1);

namespace Modules\Gdpr\Filament\Clusters\Profile\Resources\ConsentResource\Pages;

<<<<<<< HEAD
=======
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
>>>>>>> 12e4ae8 (chore: remove obsolete configuration and documentation files)
use Modules\Gdpr\Filament\Clusters\Profile\Resources\ConsentResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListConsents extends XotBaseListRecords
{
    protected static string $resource = ConsentResource::class;
<<<<<<< HEAD
=======

    /**
     * @return array<string, TextColumn|IconColumn>
     */
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')->numeric()->sortable(),
            'treatment_id' => TextColumn::make('treatment.name')->sortable(),
            'subject_id' => TextColumn::make('subject.name')->sortable(),
            'is_accepted' => IconColumn::make('is_accepted')->boolean(),
            'data_creazione' => TextColumn::make('data_creazione')->dateTime()->sortable(),
            'data_ultima_modifica' => TextColumn::make('data_ultima_modifica')->dateTime()->sortable(),
        ];
    }
>>>>>>> 12e4ae8 (chore: remove obsolete configuration and documentation files)
}
