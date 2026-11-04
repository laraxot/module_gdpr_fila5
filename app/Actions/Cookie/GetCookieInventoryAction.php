<?php

declare(strict_types=1);

namespace Modules\Gdpr\Actions\Cookie;

use Modules\Gdpr\Datas\CookieData;
use Modules\Gdpr\Datas\CookieInventoryData;
use Modules\Gdpr\Enums\CookieCategory;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

/**
 * Inventario dei cookie del sito (DCP-136, DCP-153).
 *
 * I cookie tecnici si ricavano dalla configurazione reale (nome della sessione, durata, chiave del consenso), cosi' la pagina
 * cookie policy non puo' dire una cosa diversa da quella che il server imposta. Un modulo che aggiunge un cookie NON tecnico
 * lo dichiara in `gdpr.config.cookie.extra`: da quel momento il banner passa dalla sola informazione alla richiesta di consenso.
 */
final class GetCookieInventoryAction
{
    use QueueableAction;

    public function execute(): CookieInventoryData
    {
        $sessionMinutes = config('session.lifetime');
        Assert::numeric($sessionMinutes);
        $consentDays = config('gdpr.config.cookie.consent_lifetime', 180);
        Assert::numeric($consentDays);
        $sessionName = config('session.cookie');
        Assert::string($sessionName);
        $consentName = config('cookie-consent.cookie_key', '__cookie_consent');
        Assert::string($consentName);

        $sessionDuration = (string) trans('cookie-consent::texts.duration_minutes', ['minutes' => (int) $sessionMinutes]);
        $cookies = [
            new CookieData($sessionName, CookieCategory::Necessary, (string) trans('cookie-consent::texts.purpose_session'), $sessionDuration),
            new CookieData('XSRF-TOKEN', CookieCategory::Necessary, (string) trans('cookie-consent::texts.purpose_xsrf'), $sessionDuration),
            new CookieData($consentName, CookieCategory::Necessary, (string) trans('cookie-consent::texts.purpose_consent'), (string) trans('cookie-consent::texts.duration_days', ['days' => (int) $consentDays])),
        ];

        $extra = config('gdpr.config.cookie.extra', []);
        Assert::isArray($extra);
        foreach ($extra as $row) {
            Assert::isArray($row);
            Assert::string($row['name'] ?? null);
            Assert::string($row['category'] ?? null);
            Assert::string($row['purpose'] ?? null);
            Assert::string($row['duration'] ?? null);
            $cookies[] = new CookieData($row['name'], CookieCategory::from($row['category']), (string) __($row['purpose']), (string) __($row['duration']));
        }

        return new CookieInventoryData($cookies);
    }
}
