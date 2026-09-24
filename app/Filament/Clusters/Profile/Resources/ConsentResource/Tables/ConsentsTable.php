<?php

declare(strict_types=1);

namespace Modules\Gdpr\Filament\Clusters\Profile\Resources\ConsentResource\Tables;

use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
<<<<<<< HEAD
use Modules\Gdpr\Models\Consent;
=======
>>>>>>> 12e4ae8 (chore: remove obsolete configuration and documentation files)
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class ConsentsTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
     * @var class-string<Consent>
     */
    protected static string $model = Consent::class;

    /**
=======
>>>>>>> 12e4ae8 (chore: remove obsolete configuration and documentation files)
     * @return array<string, Column>
     */
    public function getTableColumns(): array
    {
        return [
<<<<<<< HEAD
            'treatment.name' => TextColumn::make('treatment.name')->searchable()->sortable()->wrap(),
            'subject_id' => TextColumn::make('subject_id')->searchable()->sortable(),
            'accepted_at' => TextColumn::make('accepted_at')->dateTime()->sortable(),
            'revoked_at' => TextColumn::make('revoked_at')->dateTime()->sortable(),
            'id' => TextColumn::make('id')->searchable()->toggleable(isToggledHiddenByDefault: true),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
=======
            'id' => TextColumn::make('id')->sortable(),
            'name' => TextColumn::make('name')->searchable(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
>>>>>>> 12e4ae8 (chore: remove obsolete configuration and documentation files)
        ];
    }
}
