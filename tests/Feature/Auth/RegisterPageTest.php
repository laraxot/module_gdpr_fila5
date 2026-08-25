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

<<<<<<< HEAD
t('can render the registration page in English', function (): void {
=======
it('can render the registration page in English', function (): void {
>>>>>>> laraxot/dev
    gdprGet('/en/auth/register')
        ->assertStatus(200)
        ->assertSeeText(__('gdpr::register.title'));

    Livewire::test(RegisterWidget::class)->assertStatus(200);
});

it('displays the registration form elements in English', function (): void {
    gdprGet('/en/auth/register')
        ->assertSeeTextInOrder([
            __('gdpr::register.fields.email.label'),
            __('gdpr::register.fields.password.label'),
            __('gdpr::register.fields.password_confirmation.label'),
            __('gdpr::register.fields.terms.label'),
        ]);
});

<<<<<<< HEAD
t('can register a new user', function (): void {
=======
it('can register a new user', function (): void {
>>>>>>> laraxot/dev
    Livewire::test(RegisterWidget::class)
        ->set('data.email', 'test@example.com')
        ->set('data.password', 'password123')
        ->set('data.password_confirmation', 'password123')
        ->set('data.terms', true)
        ->call('register')
<<<<<<< HEAD
       ->assertRedirect('/en/home');
=======
        ->assertRedirect('/en/home');
>>>>>>> laraxot/dev

    gdprTest()->assertDatabaseHasRow('users', [
        'email' => 'test@example.com',
    ]);
});

<<<<<<< HEAD
t('shows validation errors for invalid data', function (): void {
=======
it('shows validation errors for invalid data', function (): void {
>>>>>>> laraxot/dev
    Livewire::test(RegisterWidget::class)
        ->set('data.email', 'invalid-email')
        ->set('data.password', 'short')
        ->set('data.password_confirmation', 'mismatch')
        ->set('data.terms', false)
        ->call('register')
        ->assertHasErrors([
            'data.email',
            'data.password',
            'data.password_confirmation',
            'data.terms',
        ]);
});

<<<<<<< HEAD
t('does not display duplicated phrases on the registration page', function (): void {
=======
it('does not display duplicated phrases on the registration page', function (): void {
>>>>>>> laraxot/dev
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
