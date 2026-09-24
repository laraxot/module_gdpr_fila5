<?php

declare(strict_types=1);

namespace Modules\Gdpr\Filament\Resources\TreatmentResource\Tables;

use Filament\Tables\Columns\Column;
<<<<<<< HEAD
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Modules\Gdpr\Models\Treatment;
=======
use Filament\Tables\Columns\TextColumn;
>>>>>>> 12e4ae8 (chore: remove obsolete configuration and documentation files)
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class TreatmentsTable extends XotBaseResourceTable
{
    /**
<<<<<<< HEAD
     * @var class-string<Treatment>
     */
    protected static string $model = Treatment::class;

    /**
=======
>>>>>>> 12e4ae8 (chore: remove obsolete configuration and documentation files)
     * @return array<string, Column>
     */
    public function getTableColumns(): array
    {
<<<<<<< HEAD
        return [
            'name' => TextColumn::make('name')->searchable()->sortable()->wrap(),
            'active' => IconColumn::make('active')->boolean()->sortable(),
            'required' => IconColumn::make('required')->boolean()->sortable(),
            'documentVersion' => TextColumn::make('documentVersion')->searchable()->sortable(),
            'documentUrl' => TextColumn::make('documentUrl')->wrap()->url(fn (Treatment $record): ?string => $record->documentUrl)->openUrlInNewTab()->toggleable(isToggledHiddenByDefault: true),
            'weight' => TextColumn::make('weight')->numeric()->sortable(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
=======
        /*
         * @return array<int|string, \Filament\Tables\Columns\Column>
         */
        return [
            'id' => TextColumn::make('id')->sortable(),
            'name' => TextColumn::make('name')->searchable(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
>>>>>>> 12e4ae8 (chore: remove obsolete configuration and documentation files)
        ];
    }
}
