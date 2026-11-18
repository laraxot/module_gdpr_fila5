<?php

declare(strict_types=1);

namespace Modules\Gdpr\Tests\Feature\Auth;

use Livewire\Livewire;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Gdpr\Filament\Widgets\Auth\RegisterWidget;
use Modules\Gdpr\Tests\TestCase;

uses(TestCase::class);

beforeEach(function (): void {
    /* @var \Modules\Gdpr\Tests\TestCase $this */
    LaravelLocalization::setLocale('en');
    app()->setLocale('en');
    config(['app.locale' => 'en']);
});

it('can render the registration page in English', function (): void {
    gdprGet('/en/auth/register')
        ->assertStatus(200)
        ->assertSeeText(__('gdpr::register.title'));

    Livewire::test(RegisterWidget::class)->assertStatus(200);
});

it('displays the registration form elements in English', function (): void {
    gdprGet('/en/auth/register')
        ->assertSeeInOrder([
            __('gdpr::register.form.first_name'),
            __('gdpr::register.form.last_name'),
            __('gdpr::register.form.email'),
            __('gdpr::register.form.password'),
            __('gdpr::register.form.password_confirmation'),
            __('gdpr::register.form.submit'),
        ]);
});

it('can register a new user', function (): void {
    $email = 'auth-register-'.uniqid().'@example.test';

    Livewire::test(RegisterWidget::class)
        ->set('first_name', 'Test')
        ->set('last_name', 'User')
        ->set('email', $email)
        ->set('password', 'Str0ng-Passw0rd!2026')
        ->set('password_confirmation', 'Str0ng-Passw0rd!2026')
        ->set('privacy_accepted', true)
        ->set('terms_accepted', true)
        ->call('submit')
        ->assertHasNoErrors();

    gdprTest()->assertDatabaseHasRow('users', [
        'email' => $email,
    ]);
});

it('shows validation errors for invalid data', function (): void {
    Livewire::test(RegisterWidget::class)
        ->set('email', 'invalid-email')
        ->set('password', 'short')
        ->set('password_confirmation', 'mismatch')
        ->set('privacy_accepted', false)
        ->set('terms_accepted', false)
        ->call('submit')
        ->assertHasErrors([
            'first_name',
            'email',
            'password',
            'password_confirmation',
            'privacy_accepted',
            'terms_accepted',
        ]);
});

it('does not display duplicated phrases on the registration page', function (): void {
    $response = gdprGet('/en/auth/register');

    $response->assertDontSeeText('Informazioni Generali', false);
    $response->assertDontSeeText('Hai gia un account?', false);
});

it('uses correct English translations for benefits section', function (): void {
    gdprGet('/en/auth/register')
        ->assertSeeTextInOrder([
            __('gdpr::register.benefits.community.title'),
            __('gdpr::register.benefits.community.cta'),
            __('gdpr::register.benefits.tutorials.title'),
            __('gdpr::register.benefits.tutorials.cta'),
            __('gdpr::register.benefits.networking.title'),
            __('gdpr::register.benefits.networking.cta'),
        ]);
});
