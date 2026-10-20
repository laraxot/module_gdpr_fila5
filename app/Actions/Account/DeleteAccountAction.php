<?php

declare(strict_types=1);

namespace Modules\Gdpr\Actions\Account;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Modules\Gdpr\Actions\Consent\RevokeGdprConsentsAction;
use Modules\Gdpr\Models\Consent;
use Modules\Gdpr\Models\Treatment;
use Modules\User\Models\User;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Spatie\QueueableAction\QueueableAction;

/**
 * GDPR art. 17 — Diritto alla cancellazione (DCP-164).
 *
 * Controller-action invocabile dalla route `account.delete` (GET per la vista, POST per l'esecuzione).
 * Non cancella fisicamente l'utente: usa Soft Deletes (`deleted_at`, `deleted_by`)
 * per conservare l'audit trail richiesto dall'art. 5.1(c) (minimizzazione) e
 * dall'art. 30 (registro dei trattamenti). I consensi Gdpr vengono revocati e
 * registrati come tali; i log di activity vengono soft-deleted insieme all'utente.
 */
class DeleteAccountAction
{
    use QueueableAction;

    public function __invoke(Request $request): \Illuminate\Http\RedirectResponse
    {
        $user = Auth::user();
        if ($user === null) {
            abort(401);
        }

        Gate::authorize('delete', $user);

        if ($request->isMethod('get')) {
            return redirect('/'.app()->getLocale());
        }

        /** @var array{reason?: string, confirm: string} $validated */
        $validated = $request->validate([
            'reason' => ['nullable', 'string', 'max:1000'],
            'confirm' => ['required', 'in:cancella'],
        ]);
        $reason = (string) ($validated['reason'] ?? '');

        $this->execute($user, $reason);

        return redirect('/'.app()->getLocale())
            ->with('status', 'account_deleted');
    }

    /**
     * Esecuzione atomica della cancellazione (usabile anche fuori dal controller).
     */
    public function execute(User $user, string $reason = ''): void
    {
        $cast = app(SafeStringCastAction::class);

        DB::connection('user')->transaction(function () use ($user, $reason, $cast): void {
            // 1. Revoce consensi Gdpr (art. 7.3: il consenso puo' essere revocato come dato).
            app(RevokeGdprConsentsAction::class)->execute($user);

            // 2. Tracciamento della richiesta di cancellazione come nuovo consenso.
            $this->recordDeletionConsent($user, $cast->execute($reason));

            // 3. Soft-delete dell'utente + audit trail (deleted_at, deleted_by).
            $user->deleted_at = now();
            $user->deleted_by = (string) (Auth::id() ?? $user->id);
            $user->save();

            // 4. Soft-delete dei log di activity dell'utente (se il modulo Activity e' installato).
            if (class_exists(\Modules\Activity\Models\Activity::class)) {
                \Modules\Activity\Models\Activity::where('subject_id', $user->id)
                    ->where('subject_type', $user->getMorphClass())
                    ->update(['deleted_at' => now()]);
            }
        });

        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
    }

    private function recordDeletionConsent(User $user, string $reason): void
    {
        $treatment = Treatment::firstOrCreate(
            ['name' => 'account_deletion'],
            [
                'description' => 'Richiesta di cancellazione del account (GDPR art. 17)',
                'required' => false,
                'active' => true,
                'weight' => 100,
                'documentVersion' => '1.0',
            ]
        );

        Consent::updateOrCreate(
            [
                'subject_id' => $user->id,
                'subject_type' => $user->getMorphClass(),
                'treatment_id' => $treatment->id,
            ],
            [
                'user_id' => $user->id,
                'user_type' => $user->getMorphClass(),
                'type' => 'account_deletion',
                'accepted_at' => now(),
                'revoked_at' => null,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'metadata' => ['reason' => $reason],
                'created_by' => Auth::id() ?? $user->id,
            ]
        );
    }
}