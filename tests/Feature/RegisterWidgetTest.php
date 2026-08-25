<?php

declare(strict_types=1);

namespace Modules\Gdpr\Tests\Feature;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\ValidationException;
use Modules\Gdpr\Actions\Consent\CollectGdprConsentsAction;
use Modules\Gdpr\Actions\SaveGdprConsentsAction;
use Modules\Gdpr\Actions\Validation\ValidateGdprConsentAction;
use Modules\Gdpr\Actions\Validation\ValidateUserDataAction;
use Modules\Gdpr\Models\Consent;
use Modules\Gdpr\Models\Treatment;
use Modules\Gdpr\Tests\TestCase;
use Modules\User\Actions\User\CreateUserAction;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

// ---------------------------------------------------------------------------
// ValidateGdprConsentAction
// ---------------------------------------------------------------------------

it('validates gdpr consent passes when both accepted', function (): void {
    $action = app(ValidateGdprConsentAction::class);

<<<<<<< HEAD
   gdprAssertDoesNotThrow(ValidationException::class, fn () => $action->execute(true, true));
=======
    gdprAssertDoesNotThrow(ValidationException::class, fn () => $action->execute(true, true));
>>>>>>> laraxot/dev
});

it('validates gdpr consent fails when privacy not accepted', function (): void {
    $action = app(ValidateGdprConsentAction::class);

<<<<<<< HEAD
   gdprAssertThrows(ValidationException::class, fn () => $action->execute(false, true));
=======
    gdprAssertThrows(ValidationException::class, fn () => $action->execute(false, true));
>>>>>>> laraxot/dev
});

it('validates gdpr consent fails when terms not accepted', function (): void {
    $action = app(ValidateGdprConsentAction::class);

<<<<<<< HEAD
   gdprAssertThrows(ValidationException::class, fn () => $action->execute(true, false));
=======
    gdprAssertThrows(ValidationException::class, fn () => $action->execute(true, false));
>>>>>>> laraxot/dev
});

it('validates gdpr consent fails when both not accepted', function (): void {
    $action = app(ValidateGdprConsentAction::class);

<<<<<<< HEAD
   gdprAssertThrows(ValidationException::class, fn () => $action->execute(false, false));
=======
    gdprAssertThrows(ValidationException::class, fn () => $action->execute(false, false));
>>>>>>> laraxot/dev
});

// ---------------------------------------------------------------------------
// CollectGdprConsentsAction
// ---------------------------------------------------------------------------

it('collects gdpr consents correctly', function (): void {
    $action = app(CollectGdprConsentsAction::class);

    $result = $action->execute(true, true, false);

<<<<<<< HEAD
   Assert::assertSame([
=======
    Assert::assertSame([
>>>>>>> laraxot/dev
        'privacy_accepted' => true,
        'terms_accepted' => true,
        'marketing_consent' => false,
    ], $result);
});

it('collects gdpr consents with all true', function (): void {
    $action = app(CollectGdprConsentsAction::class);

    $result = $action->execute(true, true, true);

<<<<<<< HEAD
   Assert::assertTrue($result['privacy_accepted']);
=======
    Assert::assertTrue($result['privacy_accepted']);
>>>>>>> laraxot/dev
    Assert::assertTrue($result['terms_accepted']);
    Assert::assertTrue($result['marketing_consent']);
});

it('collects gdpr consents with all false', function (): void {
    $action = app(CollectGdprConsentsAction::class);

    $result = $action->execute(false, false, false);

<<<<<<< HEAD
   Assert::assertFalse($result['privacy_accepted']);
=======
    Assert::assertFalse($result['privacy_accepted']);
>>>>>>> laraxot/dev
    Assert::assertFalse($result['terms_accepted']);
    Assert::assertFalse($result['marketing_consent']);
});

// ---------------------------------------------------------------------------
// ValidateUserDataAction
// ---------------------------------------------------------------------------

it('validates and transforms user data correctly', function (): void {
    $action = app(ValidateUserDataAction::class);

<<<<<<< HEAD
   $email = 'mario.rossi.'.uniqid().'@example.com';
=======
    $email = 'mario.rossi.'.uniqid().'@example.com';
>>>>>>> laraxot/dev
    $formData = [
        'first_name' => 'Mario',
        'last_name' => 'Rossi',
        'email' => $email,
        'password' => 'SecureP@ssw0rd!',
    ];

    $result = $action->execute($formData);

<<<<<<< HEAD
   Assert::assertSame('Mario', $result['first_name']);
=======
    Assert::assertSame('Mario', $result['first_name']);
>>>>>>> laraxot/dev
    Assert::assertSame('Rossi', $result['last_name']);
    Assert::assertSame($email, $result['email']);
    Assert::assertSame('customer_user', $result['type']);
    Assert::assertNotNull($result['email_verified_at']);
    $hashed = is_string($result['password'] ?? null) ? $result['password'] : '';
    Assert::assertTrue(Hash::check('SecureP@ssw0rd!', $hashed));
});

it('validates user data hashes the password', function (): void {
    $action = app(ValidateUserDataAction::class);

    $formData = [
        'first_name' => 'Test',
        'last_name' => 'User',
<<<<<<< HEAD
       'email' => 'hash-test-'.uniqid().'@example.com',
=======
        'email' => 'hash-test-'.uniqid().'@example.com',
>>>>>>> laraxot/dev
        'password' => 'MyP@ssword123!',
    ];

    $result = $action->execute($formData);

    // Password should be hashed, not plain text
<<<<<<< HEAD
   Assert::assertNotSame('MyP@ssword123!', $result['password']);
=======
    Assert::assertNotSame('MyP@ssword123!', $result['password']);
>>>>>>> laraxot/dev
    $hashed = is_string($result['password'] ?? null) ? $result['password'] : '';
    Assert::assertTrue(Hash::check('MyP@ssword123!', $hashed));
});

it('validates user data always sets customer_user type', function (): void {
    $action = app(ValidateUserDataAction::class);

    $formData = [
        'first_name' => 'Admin',
        'last_name' => 'Attempt',
<<<<<<< HEAD
       'email' => 'admin-attempt-'.uniqid().'@example.com',
=======
        'email' => 'admin-attempt-'.uniqid().'@example.com',
>>>>>>> laraxot/dev
        'password' => 'Tr1ckyP@ss!',
    ];

    $result = $action->execute($formData);

    // Type must always be customer_user regardless of input
<<<<<<< HEAD
   Assert::assertSame('customer_user', $result['type']);
=======
    Assert::assertSame('customer_user', $result['type']);
>>>>>>> laraxot/dev
});

// ---------------------------------------------------------------------------
// SaveGdprConsentsAction
// ---------------------------------------------------------------------------

it('saves gdpr consents for a user when treatments exist', function (): void {
<<<<<<< HEAD
   if (! Schema::connection('gdpr')->hasTable('treatments')) {
=======
    if (! Schema::connection('gdpr')->hasTable('treatments')) {
>>>>>>> laraxot/dev
        gdprSkipTest('GDPR treatments table not migrated. Run: php artisan migrate --env=testing');
    }

    $user = UserFactory::new()->createOne(['type' => 'customer_user']);

    // Ensure treatments exist
    $privacyTreatment = Treatment::firstOrCreate(
        ['name' => 'privacy_policy'],
        ['description' => 'Privacy Policy', 'weight' => 1, 'active' => true, 'required' => true]
    );
    $termsTreatment = Treatment::firstOrCreate(
        ['name' => 'terms_conditions'],
        ['description' => 'Terms and Conditions', 'weight' => 2, 'active' => true, 'required' => true]
    );
    $marketingTreatment = Treatment::firstOrCreate(
        ['name' => 'marketing_consent'],
        ['description' => 'Marketing Consent', 'weight' => 3, 'active' => true, 'required' => false]
    );

    $consents = [
        'privacy_accepted' => true,
        'terms_accepted' => true,
        'marketing_consent' => false,
    ];

    $action = app(SaveGdprConsentsAction::class);
    $action->execute($user, $consents, '127.0.0.1', 'PestTest/1.0');

    // Verify consents were saved
    $savedConsents = Consent::where('subject_id', $user->id)->get();

<<<<<<< HEAD
   Assert::assertGreaterThanOrEqual(2, $savedConsents->count());
=======
    Assert::assertGreaterThanOrEqual(2, $savedConsents->count());
>>>>>>> laraxot/dev

    // Privacy consent should be accepted
    $privacyConsent = $savedConsents->where('treatment_id', $privacyTreatment->id)->first();
    if ($privacyConsent) {
<<<<<<< HEAD
       Assert::assertNotNull($privacyConsent->accepted_at);
=======
        Assert::assertNotNull($privacyConsent->accepted_at);
>>>>>>> laraxot/dev
        Assert::assertSame('127.0.0.1', $privacyConsent->ip_address);
        Assert::assertSame('PestTest/1.0', $privacyConsent->user_agent);
    }

    // Marketing consent should NOT be accepted
    $marketingConsent = $savedConsents->where('treatment_id', $marketingTreatment->id)->first();
    if ($marketingConsent) {
<<<<<<< HEAD
       Assert::assertNull($marketingConsent->accepted_at);
=======
        Assert::assertNull($marketingConsent->accepted_at);
>>>>>>> laraxot/dev
    }
});

it('saves gdpr consents with marketing accepted', function (): void {
<<<<<<< HEAD
   if (! Schema::connection('gdpr')->hasTable('treatments')) {
=======
    if (! Schema::connection('gdpr')->hasTable('treatments')) {
>>>>>>> laraxot/dev
        gdprSkipTest('GDPR treatments table not migrated. Run: php artisan migrate --env=testing');
    }

    $user = UserFactory::new()->createOne(['type' => 'customer_user']);

    Treatment::firstOrCreate(
        ['name' => 'privacy_policy'],
        ['description' => 'Privacy Policy', 'weight' => 1, 'active' => true, 'required' => true]
    );
    Treatment::firstOrCreate(
        ['name' => 'terms_conditions'],
        ['description' => 'Terms and Conditions', 'weight' => 2, 'active' => true, 'required' => true]
    );
    $marketingTreatment = Treatment::firstOrCreate(
        ['name' => 'marketing_consent'],
        ['description' => 'Marketing Consent', 'weight' => 3, 'active' => true, 'required' => false]
    );

    $consents = [
        'privacy_accepted' => true,
        'terms_accepted' => true,
        'marketing_consent' => true,
    ];

    app(SaveGdprConsentsAction::class)->execute($user, $consents, '10.0.0.1', 'PestTest/1.0');

    $marketingConsent = Consent::where('subject_id', $user->id)
        ->where('treatment_id', $marketingTreatment->id)
        ->first();

    if ($marketingConsent) {
<<<<<<< HEAD
       Assert::assertNotNull($marketingConsent->accepted_at);
=======
        Assert::assertNotNull($marketingConsent->accepted_at);
>>>>>>> laraxot/dev
    }
});

// ---------------------------------------------------------------------------
// Full registration flow (unit-level, no Livewire rendering)
// ---------------------------------------------------------------------------

it('can create a user with customer_user type via CreateUserAction', function (): void {
<<<<<<< HEAD
   $action = app(CreateUserAction::class);
=======
    $action = app(CreateUserAction::class);
>>>>>>> laraxot/dev

    $data = [
        'first_name' => 'Pest',
        'last_name' => 'Tester',
        'email' => 'pest-register-'.uniqid().'@example.com',
        'password' => Hash::make('TestP@ssw0rd!'),
        'type' => 'customer_user',
        'state' => 'active',
        'email_verified_at' => now(),
    ];

    $user = $action->execute($data);

<<<<<<< HEAD
   Assert::assertInstanceOf(User::class, $user);
=======
    Assert::assertInstanceOf(User::class, $user);
>>>>>>> laraxot/dev
    Assert::assertSame('Pest', $user->first_name);
    Assert::assertSame('Tester', $user->last_name);
    Assert::assertSame('customer_user', $user->type);
    Assert::assertSame('active', $user->state);
    Assert::assertNotNull($user->email_verified_at);
    /* @var TestCase $this */
    assertGdprTableHas('users', [
        'id' => $user->id,
        'email' => $data['email'],
        'type' => 'customer_user',
    ], 'user');
});

it('full registration pipeline works end to end', function (): void {
<<<<<<< HEAD
   if (! Schema::connection('gdpr')->hasTable('treatments')) {
=======
    if (! Schema::connection('gdpr')->hasTable('treatments')) {
>>>>>>> laraxot/dev
        gdprSkipTest('GDPR treatments table not migrated. Run: php artisan migrate --env=testing');
    }

    // 1. Validate GDPR consents
    app(ValidateGdprConsentAction::class)->execute(true, true);

    // 2. Validate and transform user data
    $formData = [
        'first_name' => 'Integration',
        'last_name' => 'Test',
        'email' => 'integration-'.uniqid().'@example.com',
        'password' => 'Str0ngP@ssword!',
    ];
    $validatedData = app(ValidateUserDataAction::class)->execute($formData);

<<<<<<< HEAD
   Assert::assertSame('customer_user', $validatedData['type']);
=======
    Assert::assertSame('customer_user', $validatedData['type']);
>>>>>>> laraxot/dev
    // 3. Create user
    $user = app(CreateUserAction::class)->execute($validatedData);
    Assert::assertInstanceOf(User::class, $user);
    // 4. Collect consents
    $consents = app(CollectGdprConsentsAction::class)->execute(true, true, false);
    Assert::assertTrue($consents['privacy_accepted']);
    Assert::assertFalse($consents['marketing_consent']);
    // 5. Save consents (only if treatments exist)
    try {
        Treatment::firstOrCreate(
            ['name' => 'privacy_policy'],
            ['description' => 'Privacy Policy', 'weight' => 1, 'active' => true, 'required' => true]
        );
<<<<<<< HEAD
   } catch (\Exception) {
=======
    } catch (\Exception) {
>>>>>>> laraxot/dev
        // Already exists
    }
    try {
        Treatment::firstOrCreate(
            ['name' => 'terms_conditions'],
            ['description' => 'Terms and Conditions', 'weight' => 2, 'active' => true, 'required' => true]
        );
<<<<<<< HEAD
   } catch (\Exception) {
=======
    } catch (\Exception) {
>>>>>>> laraxot/dev
        // Already exists
    }
    try {
        Treatment::firstOrCreate(
            ['name' => 'marketing_consent'],
            ['description' => 'Marketing Consent', 'weight' => 3, 'active' => true, 'required' => false]
        );
<<<<<<< HEAD
   } catch (\Exception) {
=======
    } catch (\Exception) {
>>>>>>> laraxot/dev
        // Already exists
    }

    app(SaveGdprConsentsAction::class)->execute($user, $consents, '127.0.0.1', 'PestTest/1.0');

    // Verify user exists
    /* @var TestCase $this */
<<<<<<< HEAD
   assertGdprTableHas('users', [
=======
    assertGdprTableHas('users', [
>>>>>>> laraxot/dev
        'id' => $user->id,
        'type' => 'customer_user',
    ], 'user');

    // Verify consents exist
    $savedConsents = Consent::where('subject_id', $user->id)->count();
<<<<<<< HEAD
   Assert::assertGreaterThanOrEqual(2, $savedConsents);
=======
    Assert::assertGreaterThanOrEqual(2, $savedConsents);
>>>>>>> laraxot/dev
});

// ---------------------------------------------------------------------------
// Translation keys exist
// ---------------------------------------------------------------------------

it('has all required translation keys for register page', function (): void {
    $requiredKeys = [
        'gdpr::register.title',
        'gdpr::register.subtitle',
        'gdpr::register.submit',
        'gdpr::register.submitting',
        'gdpr::register.consents.title',
        'gdpr::register.consents.privacy_checkbox_html',
        'gdpr::register.consents.terms_checkbox_html',
        'gdpr::register.consents.privacy_policy_required',
        'gdpr::register.consents.terms_required',
        'gdpr::register.consents.marketing_label',
        'gdpr::register.already_registered',
        'gdpr::register.login',
        'gdpr::register.fields.first_name',
        'gdpr::register.fields.last_name',
        'gdpr::register.fields.email',
        'gdpr::register.fields.password',
        'gdpr::register.fields.password_confirmation',
    ];

    foreach ($requiredKeys as $key) {
        $translated = __($key);
        // Translation should not return the raw key
<<<<<<< HEAD
       Assert::assertNotSame($key, "Translation key [{$key}] is missing or returns raw key", $translated);
=======
        Assert::assertNotSame($key, "Translation key [{$key}] is missing or returns raw key", $translated);
>>>>>>> laraxot/dev
    }
});
