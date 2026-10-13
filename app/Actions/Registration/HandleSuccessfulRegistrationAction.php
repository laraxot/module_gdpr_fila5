<?php

declare(strict_types=1);

namespace Modules\Gdpr\Actions\Registration;

use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Modules\User\Models\User;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Filament\Widgets\XotBaseWidget; // Use the base widget for type hinting
use Spatie\QueueableAction\QueueableAction;

class HandleSuccessfulRegistrationAction
{
    use QueueableAction;

    public function execute(User $user, XotBaseWidget $widget): void
    {
        Auth::login($user);

        $cast = app(SafeStringCastAction::class);

        Notification::make()
            ->title($cast->execute(\__('gdpr::register.success')))
            ->body($cast->execute(\__('gdpr::register.success_message')))
            ->success()
            ->send();

        // Come il login: si torna alla pagina che richiedeva l'accesso; altrimenti dashboard del progetto o home. Prima era
        // `route('dashboard')` senza controllo, che nel front office porta a un 404 appena dopo la registrazione.
        $widget->redirectIntended(default: Route::has('dashboard')
            ? route('dashboard')
            : url('/'.app()->getLocale()));
    }
}
