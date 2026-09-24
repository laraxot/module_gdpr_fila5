<?php

declare(strict_types=1);

namespace Modules\Gdpr\Filament\Clusters\Profile\Resources\ProfileResource\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;

class ProfileInfolist extends XotBaseResourceInfolist
=======

class ProfileInfolist
>>>>>>> 12e4ae8 (chore: remove obsolete configuration and documentation files)
{
    /**
     * @return array<string, Component>
     */
<<<<<<< HEAD
    public function getInfolistSchema(): array
=======
    public static function getInfolistSchema(): array
>>>>>>> 12e4ae8 (chore: remove obsolete configuration and documentation files)
    {
        return [
            'id' => TextEntry::make('id'),
            'name' => TextEntry::make('name'),
            'created_at' => TextEntry::make('created_at')->dateTime(),
        ];
    }
}
