<?php

declare(strict_types=1);

namespace Modules\Gdpr\Filament\Resources\ProfileResource\Tables;

use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class ProfilesTable extends XotBaseResourceTable
{
    /**
     * @return array<string, Column>
     */
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
            'bio' => TextColumn::make('bio')->searchable()->toggleable(isToggledHiddenByDefault: true),
            'post_type' => TextColumn::make('post_type')->searchable()->sortable(),
            'phone' => TextColumn::make('phone')->searchable()->sortable(),
            'address' => TextColumn::make('address')->searchable()->toggleable(isToggledHiddenByDefault: true),
            'tax_code' => TextColumn::make('tax_code')->searchable()->sortable(),
            'vat_number' => TextColumn::make('vat_number')->searchable()->sortable(),
            'avatar' => TextColumn::make('avatar')->label('Avatar'),
            'is_active' => IconColumn::make('is_active')->boolean(),
        ];
    }
}
