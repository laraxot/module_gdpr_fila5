<?php

declare(strict_types=1);

namespace Modules\Gdpr\Actions\Registration;

use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Log;
use Spatie\QueueableAction\QueueableAction;

class HandleRegistrationErrorAction
{
    use QueueableAction;

    public function execute(\Exception $e): void
    {
        Log::error('Registration failed: '.$e->getMessage(), [
            'exception' => $e,
            'trace' => $e->getTraceAsString(),
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        Notification::make()
            ->title(\__('gdpr::register.error'))
            ->body(\__('gdpr::register.error_message'))
            ->danger()
            ->send();
    }
}
