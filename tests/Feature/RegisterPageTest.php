<?php

declare(strict_types=1);

<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
=======
use Livewire\Features\SupportTesting\Testable;
use Livewire\Livewire;
use Modules\Gdpr\Filament\Widgets\Auth\RegisterWidget;
>>>>>>> laraxot/dev
use Modules\Gdpr\Tests\TestCase;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

<<<<<<< HEAD
it('renders the registration page successfully', function () {
    gdprGet('/en/auth/register')
        ->assertStatus(200)
        ->assertSee('Create Your FREE Account')
        ->assertSee('No credit card required - 100% FREE forever!');
});

it('displays all required form fields', function () {
    gdprGet('/en/auth/register')
        ->assertStatus(200)
        ->assertSee('First Name')
        ->assertSee('Last Name')
        ->assertSee('Your Best Email')
        ->assertSee('Secure password')
        ->assertSee('Confirm Password')
        ->assertSee('Personal Information')
        ->assertSee('Required Consents');
});

it('displays all required consent checkboxes', function () {
    gdprGet('/en/auth/register')
        ->assertStatus(200)
        ->assertSee('I have read and understood the Privacy Policy')
        ->assertSee('I have read and accept the Terms and Conditions');
});

it('displays optional marketing consent', function () {
    gdprGet('/en/auth/register')
        ->assertStatus(200)
        ->assertSee('I want to receive pizza tips and meetup invitations (optional)');
});

it('requires first name to be filled', function () {
    gdprPost('/en/auth/register', [
        'last_name' => 'Doe',
        'email' => 'john@example.com',
        'password' => 'Password123!',
        'password_confirmation' => 'Password123!',
        'privacy_accepted' => '1',
        'terms_accepted' => '1',
    ])
        ->assertStatus(302)
        ->assertSessionHasErrors(['first_name']);
});

it('requires last name to be filled', function () {
    gdprPost('/en/auth/register', [
        'first_name' => 'John',
        'email' => 'john@example.com',
        'password' => 'Password123!',
        'password_confirmation' => 'Password123!',
        'privacy_accepted' => '1',
        'terms_accepted' => '1',
    ])
        ->assertStatus(302)
        ->assertSessionHasErrors(['last_name']);
});

it('requires email to be filled', function () {
    gdprPost('/en/auth/register', [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'password' => 'Password123!',
        'password_confirmation' => 'Password123!',
        'privacy_accepted' => '1',
        'terms_accepted' => '1',
    ])
        ->assertStatus(302)
        ->assertSessionHasErrors(['email']);
});

it('requires email to be valid format', function () {
    gdprPost('/en/auth/register', [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'invalid-email',
        'password' => 'Password123!',
        'password_confirmation' => 'Password123!',
        'privacy_accepted' => '1',
        'terms_accepted' => '1',
    ])
        ->assertStatus(302)
        ->assertSessionHasErrors(['email']);
});

it('requires email to be unique', function () {
    UserFactory::new()->createOne(['email' => 'john@example.com']);

    gdprPost('/en/auth/register', [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john@example.com',
        'password' => 'Password123!',
        'password_confirmation' => 'Password123!',
        'privacy_accepted' => '1',
        'terms_accepted' => '1',
    ])
        ->assertStatus(302)
        ->assertSessionHasErrors(['email']);
});

it('requires password to be filled', function () {
    gdprPost('/en/auth/register', [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john@example.com',
        'password_confirmation' => 'Password123!',
        'privacy_accepted' => '1',
        'terms_accepted' => '1',
    ])
        ->assertStatus(302)
        ->assertSessionHasErrors(['password']);
});

it('requires password confirmation to match', function () {
    gdprPost('/en/auth/register', [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john@example.com',
        'password' => 'Password123!',
        'password_confirmation' => 'DifferentPassword123!',
        'privacy_accepted' => '1',
        'terms_accepted' => '1',
    ])
        ->assertStatus(302)
        ->assertSessionHasErrors(['password']);
});

it('requires password to be at least 12 characters', function () {
    gdprPost('/en/auth/register', [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john@example.com',
        'password' => 'Short1!',
        'password_confirmation' => 'Short1!',
        'privacy_accepted' => '1',
        'terms_accepted' => '1',
    ])
        ->assertStatus(302)
        ->assertSessionHasErrors(['password']);
});

it('requires password to contain uppercase letter', function () {
    gdprPost('/en/auth/register', [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john@example.com',
        'password' => 'lowercase123!',
        'password_confirmation' => 'lowercase123!',
        'privacy_accepted' => '1',
        'terms_accepted' => '1',
    ])
        ->assertStatus(302)
        ->assertSessionHasErrors(['password']);
});

it('requires password to contain lowercase letter', function () {
    gdprPost('/en/auth/register', [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john@example.com',
        'password' => 'UPPERCASE123!',
        'password_confirmation' => 'UPPERCASE123!',
        'privacy_accepted' => '1',
        'terms_accepted' => '1',
    ])
        ->assertStatus(302)
        ->assertSessionHasErrors(['password']);
});

it('requires password to contain number', function () {
    gdprPost('/en/auth/register', [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john@example.com',
        'password' => 'NoNumbers!',
        'password_confirmation' => 'NoNumbers!',
        'privacy_accepted' => '1',
        'terms_accepted' => '1',
    ])
        ->assertStatus(302)
        ->assertSessionHasErrors(['password']);
});

it('requires password to contain special character', function () {
    gdprPost('/en/auth/register', [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john@example.com',
        'password' => 'NoSpecialChar123',
        'password_confirmation' => 'NoSpecialChar123',
        'privacy_accepted' => '1',
        'terms_accepted' => '1',
    ])
        ->assertStatus(302)
        ->assertSessionHasErrors(['password']);
});

it('requires privacy policy consent to be accepted', function () {
    gdprPost('/en/auth/register', [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john@example.com',
        'password' => 'Password123!',
        'password_confirmation' => 'Password123!',
        'terms_accepted' => '1',
    ])
        ->assertStatus(302)
        ->assertSessionHasErrors(['privacy_accepted']);
});

it('requires terms consent to be accepted', function () {
    gdprPost('/en/auth/register', [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john@example.com',
        'password' => 'Password123!',
        'password_confirmation' => 'Password123!',
        'privacy_accepted' => '1',
    ])
        ->assertStatus(302)
        ->assertSessionHasErrors(['terms_accepted']);
});

it('allows registration with all required fields and consents', function () {
    gdprPost('/en/auth/register', [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john.doe@example.com',
        'password' => 'Password123!',
        'password_confirmation' => 'Password123!',
        'privacy_accepted' => '1',
        'terms_accepted' => '1',
        'marketing_consent' => '0',
    ])
        ->assertStatus(302);

    // Verify user was created
    Assert::assertTrue(User::where('email', 'john.doe@example.com')->exists());
});

it('allows registration with optional marketing consent', function () {
    gdprPost('/en/auth/register', [
        'first_name' => 'Jane',
        'last_name' => 'Smith',
        'email' => 'jane.smith@example.com',
        'password' => 'Password123!',
        'password_confirmation' => 'Password123!',
        'privacy_accepted' => '1',
        'terms_accepted' => '1',
        'marketing_consent' => '1',
    ])
        ->assertStatus(302);

    // Verify user was created
    Assert::assertTrue(User::where('email', 'jane.smith@example.com')->exists());
});

it('stores user data correctly after successful registration', function () {
    gdprPost('/en/auth/register', [
        'first_name' => 'Alice',
        'last_name' => 'Johnson',
        'email' => 'alice@example.com',
        'password' => 'SecurePass123!',
        'password_confirmation' => 'SecurePass123!',
        'privacy_accepted' => '1',
        'terms_accepted' => '1',
    ])
        ->assertStatus(302);

    $user = User::where('email', 'alice@example.com')->first();

    Assert::assertNotNull($user);
    Assert::assertSame('Alice', $user->first_name);
    Assert::assertSame('Johnson', $user->last_name);
    Assert::assertSame('alice@example.com', $user->email);
    Assert::assertTrue($user->is_active);
});

it('hashes the password after registration', function () {
    $plainPassword = config('app.test_password', 'test-password-123');

    gdprPost('/en/auth/register', [
        'first_name' => 'Bob',
        'last_name' => 'Wilson',
        'email' => 'bob@example.com',
        'password' => $plainPassword,
        'password_confirmation' => $plainPassword,
        'privacy_accepted' => '1',
        'terms_accepted' => '1',
    ])
        ->assertStatus(302);

    $user = User::where('email', 'bob@example.com')->first();
    Assert::assertNotNull($user);

    Assert::assertNotSame($plainPassword, $user->password);
    Assert::assertNotEmpty($user->password);
});

it('redirects after successful registration', function () {
    gdprPost('/en/auth/register', [
        'first_name' => 'Charlie',
        'last_name' => 'Brown',
        'email' => 'charlie@example.com',
        'password' => 'Password123!',
        'password_confirmation' => 'Password123!',
        'privacy_accepted' => '1',
        'terms_accepted' => '1',
    ])
        ->assertStatus(302)
        ->assertRedirect();
});

it('trims whitespace from input fields', function () {
    gdprPost('/en/auth/register', [
        'first_name' => '  John  ',
        'last_name' => '  Doe  ',
        'email' => '  john@example.com  ',
        'password' => 'Password123!',
        'password_confirmation' => 'Password123!',
        'privacy_accepted' => '1',
        'terms_accepted' => '1',
    ])
        ->assertStatus(302);

    $user = User::where('email', 'john@example.com')->first();
    Assert::assertNotNull($user);

    Assert::assertSame('John', $user->first_name);
    Assert::assertSame('Doe', $user->last_name);
    Assert::assertSame('john@example.com', $user->email);
});

it('prevents registration when already logged in', function () {
    $user = UserFactory::new()->createOne();

    Auth::login($user);

    gdprGet('/en/auth/register')
        ->assertRedirect();
});

it('handles very long input names correctly', function () {
    $longName = Str::random(250);

    gdprPost('/en/auth/register', [
        'first_name' => $longName,
        'last_name' => 'Doe',
        'email' => 'longname@example.com',
        'password' => 'Password123!',
        'password_confirmation' => 'Password123!',
        'privacy_accepted' => '1',
        'terms_accepted' => '1',
    ])
        ->assertStatus(302)
        ->assertSessionHasErrors(['first_name']);
});

it('handles very long email correctly', function () {
    $longEmail = Str::random(200).'@example.com';

    gdprPost('/en/auth/register', [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => $longEmail,
        'password' => 'Password123!',
        'password_confirmation' => 'Password123!',
        'privacy_accepted' => '1',
        'terms_accepted' => '1',
    ])
        ->assertStatus(302)
        ->assertSessionHasErrors(['email']);
});

it('prevents SQL injection attempts in email', function () {
    $maliciousEmail = "john@example.com'; DROP TABLE users; --";

    gdprPost('/en/auth/register', [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => $maliciousEmail,
        'password' => 'Password123!',
        'password_confirmation' => 'Password123!',
        'privacy_accepted' => '1',
        'terms_accepted' => '1',
    ])
        ->assertStatus(302)
        ->assertSessionHasErrors(['email']);
});

it('displays login link on registration page', function () {
    gdprGet('/en/auth/register')
        ->assertStatus(200)
        ->assertSee('Already have an account?')
        ->assertSee('Login now');
});

it('contains proper SEO meta tags', function () {
    gdprGet('/en/auth/register')
        ->assertStatus(200)
        ->assertSee('<title>', false)
        ->assertSee('<nome progetto> Community');
});

it('has proper accessibility attributes', function () {
    gdprGet('/en/auth/register')
        ->assertStatus(200)
        ->assertSee('aria-label');
=======
/*
 * Pagina /<lingua>/auth/register e form di registrazione (RegisterWidget).
 *
 * Il modulo Gdpr e' condiviso tra progetti: i testi si controllano con le chiavi di traduzione, mai con le frasi di
 * un sito (ogni progetto le sostituisce in lang/vendor/gdpr). La registrazione e' un widget Livewire: non esiste un
 * POST classico su /auth/register, quindi validazione e salvataggio si provano sul widget.
 */

const GDPR_TEST_PASSWORD = 'Str0ng-Passw0rd!2026';

/**
 * @param  array<string, mixed>  $overrides
 * @return Testable<RegisterWidget>
 */
function gdprRegisterForm(array $overrides = []): Testable
{
    $data = array_merge([
        'first_name' => 'Giulia',
        'last_name' => 'Bianchi',
        'email' => 'giulia.'.uniqid().'@example.test',
        'password' => GDPR_TEST_PASSWORD,
        'password_confirmation' => GDPR_TEST_PASSWORD,
        'privacy_accepted' => true,
        'terms_accepted' => true,
        'marketing_consent' => false,
    ], $overrides);

    $component = Livewire::test(RegisterWidget::class);
    foreach ($data as $field => $value) {
        $component->set($field, $value);
    }

    return $component;
}

it('renders the registration page with the translated texts', function (string $locale): void {
    app()->setLocale($locale);

    gdprGet('/'.$locale.'/auth/register')
        ->assertOk()
        ->assertSee('lang="'.$locale.'"', false)
        ->assertSee(__('gdpr::register.form.cta_title'), false)
        ->assertSee(__('gdpr::register.form.first_name'), false)
        ->assertSee(__('gdpr::register.form.last_name'), false)
        ->assertSee(__('gdpr::register.form.email'), false)
        ->assertSee(__('gdpr::register.form.password_confirmation'), false)
        ->assertSee(__('gdpr::register.form.submit'), false)
        ->assertSee('wire:model="privacy_accepted"', false)
        ->assertSee('wire:model="terms_accepted"', false)
        ->assertSee('wire:model="marketing_consent"', false);
})->with(['it', 'en']);

it('never shows a raw translation key on the registration page', function (string $locale): void {
    app()->setLocale($locale);

    gdprGet('/'.$locale.'/auth/register')
        ->assertOk()
        ->assertDontSee('gdpr::register.', false);
})->with(['it', 'en']);

it('links the registration page to the login page in the same language', function (): void {
    gdprGet('/en/auth/register')
        ->assertOk()
        ->assertSee('/en/auth/login', false);
});

it('requires every personal field', function (string $field): void {
    gdprRegisterForm([$field => ''])
        ->call('submit')
        ->assertHasErrors([$field => 'required']);
})->with(['first_name', 'last_name', 'email', 'password']);

it('rejects an invalid email', function (): void {
    gdprRegisterForm(['email' => 'not-an-email'])
        ->call('submit')
        ->assertHasErrors(['email' => 'email']);
});

it('rejects an email that is already registered', function (): void {
    $existing = UserFactory::new()->createOne(['email' => 'taken.'.uniqid().'@example.test']);

    gdprRegisterForm(['email' => $existing->email])
        ->call('submit')
        ->assertHasErrors(['email' => 'unique']);
});

it('rejects a password confirmation that does not match', function (): void {
    gdprRegisterForm(['password_confirmation' => 'Another-Passw0rd!2026'])
        ->call('submit')
        ->assertHasErrors(['password_confirmation' => 'same']);
});

it('rejects a weak password', function (string $weak): void {
    gdprRegisterForm(['password' => $weak, 'password_confirmation' => $weak])
        ->call('submit')
        ->assertHasErrors(['password']);
})->with([
    'too short' => 'Ab1!',
    'no uppercase' => 'lowercase-only-1!',
    'no number' => 'No-Numbers-Here!',
]);

it('requires the privacy and terms consents with a translated message', function (string $consent, string $key): void {
    gdprRegisterForm([$consent => false])
        ->call('submit')
        ->assertHasErrors([$consent => 'accepted']);

    Assert::assertNotSame($key, __($key));
})->with([
    'privacy' => ['privacy_accepted', 'gdpr::register.consents.privacy_policy_required'],
    'terms' => ['terms_accepted', 'gdpr::register.consents.terms_required'],
]);

it('creates the user with a hashed password when everything is valid', function (bool $marketing): void {
    $email = 'nuovo.'.uniqid().'@example.test';

    gdprRegisterForm(['email' => $email, 'marketing_consent' => $marketing])
        ->call('submit')
        ->assertHasNoErrors();

    $user = User::query()->where('email', $email)->first();
    Assert::assertNotNull($user);
    Assert::assertSame('Giulia Bianchi', $user->name);
    Assert::assertNotSame(GDPR_TEST_PASSWORD, $user->password);
    Assert::assertTrue(password_verify(GDPR_TEST_PASSWORD, (string) $user->password));
})->with([
    'without marketing' => false,
    'with marketing' => true,
]);

it('does not show the form to a user who is already logged in', function (): void {
    Assert::assertTrue(RegisterWidget::canView());

    $this->actingAs(UserFactory::new()->createOne());

    Assert::assertFalse(RegisterWidget::canView());
>>>>>>> laraxot/dev
});
