<?php

declare(strict_types=1);

namespace Modules\Gdpr\Tests\Feature;

use Modules\Gdpr\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

/*
 * Localization Tests for Registration Page.
 *
 * Tests that all supported locales have complete translations:
 * - Italian (it) - Primary
 * - English (en) - International
 * - Spanish (es) - LATAM
 * - German (de) - Germany/EU
 * - French (fr) - France/EU
 * - Russian (ru) - CIS/Eastern Europe
 */
// ---------------------------------------------------------------------------
// All Locales Have Required Keys
// ---------------------------------------------------------------------------

it('has all required keys in Italian locale', function (): void {
    app()->setLocale('it');

    $requiredKeys = [
        'gdpr::register.title',
        'gdpr::register.subtitle',
        'gdpr::register.form.cta_title',
        'gdpr::register.form.cta_subtitle',
        'gdpr::register.form.terms_notice',
        'gdpr::register.benefits.community.title',
        'gdpr::register.benefits.tutorials.title',
        'gdpr::register.benefits.networking.title',
        'gdpr::register.social_proof',
        'gdpr::register.fields.first_name.label',
        'gdpr::register.fields.last_name.label',
        'gdpr::register.fields.email.label',
        'gdpr::register.fields.password.label',
        'gdpr::register.fields.password_confirmation.label',
        'gdpr::register.sections.user_info',
        'gdpr::register.sections.required_consents',
        'gdpr::register.sections.optional_consents',
        'gdpr::register.consents.privacy_policy_label',
        'gdpr::register.consents.terms_label',
        'gdpr::register.consents.marketing_label',
        'gdpr::register.already_registered',
        'gdpr::register.login',
    ];

    foreach ($requiredKeys as $key) {
        $translated = __($key);
<<<<<<< HEAD
       Assert::assertNotSame($key, "Italian translation [{$key}] missing", $translated);
=======
        Assert::assertNotSame($key, "Italian translation [{$key}] missing", $translated);
>>>>>>> laraxot/dev
    }
});

it('has all required keys in English locale', function (): void {
    app()->setLocale('en');

    $requiredKeys = [
        'gdpr::register.title',
        'gdpr::register.subtitle',
        'gdpr::register.form.cta_title',
        'gdpr::register.form.cta_subtitle',
        'gdpr::register.form.terms_notice',
        'gdpr::register.benefits.community.title',
        'gdpr::register.benefits.tutorials.title',
        'gdpr::register.benefits.networking.title',
        'gdpr::register.social_proof',
        'gdpr::register.fields.first_name.label',
        'gdpr::register.fields.last_name.label',
        'gdpr::register.fields.email.label',
        'gdpr::register.fields.password.label',
        'gdpr::register.fields.password_confirmation.label',
        'gdpr::register.sections.user_info',
        'gdpr::register.sections.required_consents',
        'gdpr::register.sections.optional_consents',
        'gdpr::register.consents.privacy_policy_label',
        'gdpr::register.consents.terms_label',
        'gdpr::register.consents.marketing_label',
        'gdpr::register.already_registered',
        'gdpr::register.login',
    ];

    foreach ($requiredKeys as $key) {
        $translated = __($key);
<<<<<<< HEAD
       Assert::assertNotSame($key, "English translation [{$key}] missing", $translated);
=======
        Assert::assertNotSame($key, "English translation [{$key}] missing", $translated);
>>>>>>> laraxot/dev
    }
});

it('has all required keys in Spanish locale', function (): void {
    app()->setLocale('es');

    $requiredKeys = [
        'gdpr::register.title',
        'gdpr::register.subtitle',
        'gdpr::register.form.cta_title',
        'gdpr::register.form.cta_subtitle',
        'gdpr::register.benefits.community.title',
        'gdpr::register.benefits.tutorials.title',
        'gdpr::register.benefits.networking.title',
        'gdpr::register.already_registered',
        'gdpr::register.login',
    ];

    foreach ($requiredKeys as $key) {
        $translated = __($key);
<<<<<<< HEAD
       Assert::assertNotSame($key, "Spanish translation [{$key}] missing", $translated);
=======
        Assert::assertNotSame($key, "Spanish translation [{$key}] missing", $translated);
>>>>>>> laraxot/dev
    }
});

it('has all required keys in German locale', function (): void {
    app()->setLocale('de');

    $requiredKeys = [
        'gdpr::register.title',
        'gdpr::register.subtitle',
        'gdpr::register.form.cta_title',
        'gdpr::register.form.cta_subtitle',
        'gdpr::register.benefits.community.title',
        'gdpr::register.benefits.tutorials.title',
        'gdpr::register.benefits.networking.title',
        'gdpr::register.already_registered',
        'gdpr::register.login',
    ];

    foreach ($requiredKeys as $key) {
        $translated = __($key);
<<<<<<< HEAD
       Assert::assertNotSame($key, "German translation [{$key}] missing", $translated);
=======
        Assert::assertNotSame($key, "German translation [{$key}] missing", $translated);
>>>>>>> laraxot/dev
    }
});

it('has all required keys in French locale', function (): void {
    app()->setLocale('fr');

    $requiredKeys = [
        'gdpr::register.title',
        'gdpr::register.subtitle',
        'gdpr::register.form.cta_title',
        'gdpr::register.form.cta_subtitle',
        'gdpr::register.benefits.community.title',
        'gdpr::register.benefits.tutorials.title',
        'gdpr::register.benefits.networking.title',
        'gdpr::register.already_registered',
        'gdpr::register.login',
    ];

    foreach ($requiredKeys as $key) {
        $translated = __($key);
<<<<<<< HEAD
       Assert::assertNotSame($key, "French translation [{$key}] missing", $translated);
=======
        Assert::assertNotSame($key, "French translation [{$key}] missing", $translated);
>>>>>>> laraxot/dev
    }
});

it('has all required keys in Russian locale', function (): void {
    app()->setLocale('ru');

    $requiredKeys = [
        'gdpr::register.title',
        'gdpr::register.subtitle',
        'gdpr::register.form.cta_title',
        'gdpr::register.form.cta_subtitle',
        'gdpr::register.benefits.community.title',
        'gdpr::register.benefits.tutorials.title',
        'gdpr::register.benefits.networking.title',
        'gdpr::register.already_registered',
        'gdpr::register.login',
    ];

    foreach ($requiredKeys as $key) {
        $translated = __($key);
<<<<<<< HEAD
       Assert::assertNotSame($key, "Russian translation [{$key}] missing", $translated);
=======
        Assert::assertNotSame($key, "Russian translation [{$key}] missing", $translated);
>>>>>>> laraxot/dev
    }
});

// ---------------------------------------------------------------------------
// Locale Detection Tests
// ---------------------------------------------------------------------------

it('detects Italian locale from URL', function (): void {
<<<<<<< HEAD
   $response = gdprGet('/it/auth/register');
=======
    $response = gdprGet('/it/auth/register');
>>>>>>> laraxot/dev
    $response->assertSee('lang="it"', false);
    $response->assertStatus(200);
});

it('detects English locale from URL', function (): void {
<<<<<<< HEAD
   $response = gdprGet('/en/auth/register');
=======
    $response = gdprGet('/en/auth/register');
>>>>>>> laraxot/dev
    $response->assertSee('lang="en"', false);
    $response->assertStatus(200);
});

it('detects Spanish locale from URL', function (): void {
<<<<<<< HEAD
   $response = gdprGet('/es/auth/register');
=======
    $response = gdprGet('/es/auth/register');
>>>>>>> laraxot/dev
    $response->assertSee('lang="es"', false);
    $response->assertStatus(200);
});

it('detects German locale from URL', function (): void {
<<<<<<< HEAD
   $response = gdprGet('/de/auth/register');
=======
    $response = gdprGet('/de/auth/register');
>>>>>>> laraxot/dev
    $response->assertSee('lang="de"', false);
    $response->assertStatus(200);
});

it('detects French locale from URL', function (): void {
<<<<<<< HEAD
   $response = gdprGet('/fr/auth/register');
=======
    $response = gdprGet('/fr/auth/register');
>>>>>>> laraxot/dev
    $response->assertSee('lang="fr"', false);
    $response->assertStatus(200);
});

it('detects Russian locale from URL', function (): void {
<<<<<<< HEAD
   $response = gdprGet('/ru/auth/register');
=======
    $response = gdprGet('/ru/auth/register');
>>>>>>> laraxot/dev
    $response->assertSee('lang="ru"', false);
    $response->assertStatus(200);
});

// ---------------------------------------------------------------------------
// Translation Content Tests
// ---------------------------------------------------------------------------

it('Italian title contains pizza reference', function (): void {
    app()->setLocale('it');
    $title = __('gdpr::register.title');
<<<<<<< HEAD
   Assert::assertStringContainsString((string) 'Pizza', (string) $title);
=======
    Assert::assertStringContainsString((string) 'Pizza', (string) $title);
>>>>>>> laraxot/dev
});

it('English title contains pizza reference', function (): void {
    app()->setLocale('en');
    $title = __('gdpr::register.title');
<<<<<<< HEAD
   Assert::assertStringContainsString((string) 'Pizza', (string) $title);
=======
    Assert::assertStringContainsString((string) 'Pizza', (string) $title);
>>>>>>> laraxot/dev
});

it('Italian CTA is action-oriented', function (): void {
    app()->setLocale('it');
    $cta = __('gdpr::register.form.cta_title');
<<<<<<< HEAD
   Assert::assertStringContainsString((string) 'gratuito', (string) $cta);
=======
    Assert::assertStringContainsString((string) 'gratuito', (string) $cta);
>>>>>>> laraxot/dev
});

it('English CTA is action-oriented', function (): void {
    app()->setLocale('en');
    $cta = __('gdpr::register.form.cta_title');
<<<<<<< HEAD
   Assert::assertStringContainsString((string) 'FREE', (string) $cta);
=======
    Assert::assertStringContainsString((string) 'FREE', (string) $cta);
>>>>>>> laraxot/dev
});
