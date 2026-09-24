<?php

declare(strict_types=1);

namespace Modules\Gdpr\Filament\Resources\EventResource\Tables;

<<<<<<< HEAD
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use Modules\Gdpr\Models\Event;
=======
use Filament\Tables\Columns\TextColumn;
>>>>>>> 12e4ae8 (chore: remove obsolete configuration and documentation files)
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class EventsTable extends XotBaseResourceTable
{
<<<<<<< HEAD
    /**
     * @var class-string<Event>
     */
    protected static string $model = Event::class;

    /**
     * @return array<string, Column>
     */
    public function getTableColumns(): array
    {
        return [
            'action' => TextColumn::make('action')->searchable()->sortable()->badge(),
            'subject_id' => TextColumn::make('subject_id')->searchable()->sortable(),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
            'consent_id' => TextColumn::make('consent_id')->searchable()->toggleable(isToggledHiddenByDefault: true),
            'treatment_id' => TextColumn::make('treatment_id')->searchable()->toggleable(isToggledHiddenByDefault: true),
            'id' => TextColumn::make('id')->searchable()->toggleable(isToggledHiddenByDefault: true),
            'updated_at' => TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
=======
    public function getTableColumns(): array
    {
        /*
         * @return array<int|string, \Filament\Tables\Columns\Column>
         */
        return [
            'id' => TextColumn::make('id')->searchable()->sortable(),
            'created_at' => TextColumn::make('created_at')->dateTime(),
            'updated_at' => TextColumn::make('updated_at')->dateTime(),
>>>>>>> 12e4ae8 (chore: remove obsolete configuration and documentation files)
        ];
    }
}
