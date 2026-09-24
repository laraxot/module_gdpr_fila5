<?php

declare(strict_types=1);

namespace Modules\Gdpr\Filament\Resources\ProfileResource\Pages;

<<<<<<< HEAD
=======
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
>>>>>>> 12e4ae8 (chore: remove obsolete configuration and documentation files)
use Modules\Gdpr\Filament\Resources\ProfileResource;
use Modules\User\Filament\Resources\BaseProfileResource\Pages\ListProfiles as UserListProfiles;

class ListProfiles extends UserListProfiles
{
    protected static string $resource = ProfileResource::class;
<<<<<<< HEAD
=======

    /**
     * @return array<string, TextColumn|IconColumn>
     */
    #[\Override]
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')->searchable(),
            'type' => TextColumn::make('type')->searchable(),
            'first_name' => TextColumn::make('first_name')->searchable(),
            'last_name' => TextColumn::make('last_name')->searchable(),
            'full_name' => TextColumn::make('full_name')->searchable(),
            'email' => TextColumn::make('email')->searchable(),
            'created_at' => TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'updated_at' => TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'user_id' => TextColumn::make('user_id')->searchable(),
            'updated_by' => TextColumn::make('updated_by')->searchable(),
            'created_by' => TextColumn::make('created_by')->searchable(),
            'deleted_at' => TextColumn::make('deleted_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'deleted_by' => TextColumn::make('deleted_by')->searchable(),
            'is_active' => IconColumn::make('is_active')->boolean(),
        ];
    }
>>>>>>> 12e4ae8 (chore: remove obsolete configuration and documentation files)
}
