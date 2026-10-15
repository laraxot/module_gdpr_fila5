<?php

declare(strict_types=1);

namespace Modules\Gdpr\Actions\Consent;

use Illuminate\Support\Facades\DB;
use Modules\Gdpr\Actions\SaveGdprConsentsAction;
use Modules\Gdpr\Models\Consent;
use Modules\Gdpr\Models\Treatment;
use Modules\User\Models\User;
use Spatie\QueueableAction\QueueableAction;

/**
 * Revoca tutti i consensi Gdpr di un utente (art. 7.3 GDPR).
 *
 * Non cancella i record: imposta `revoked_at` e `revoked_ip_address` per
 * conservare l'audit trail (art. 30). I consensi sono comunque cancellati
 * in cascata al soft-delete dell'utente.
 */
class RevokeGdprConsentsAction
{
    use QueueableAction;

    public function execute(User $user): void
    {
        $ip = request()->ip();
        $userAgent = request()->userAgent();

        Consent::where('subject_id', $user->id)
            ->where('subject_type', $user->getMorphClass())
            ->whereNull('revoked_at')
            ->update([
                'revoked_at' => now(),
                'revoked_ip_address' => $ip,
                'revoked_user_agent' => $userAgent,
                'updated_by' => Auth()->id() ?? $user->id,
            ]);
    }
}