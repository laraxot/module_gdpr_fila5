<?php

declare(strict_types=1);

namespace Modules\Gdpr\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Gdpr\Models\Profile;
use Modules\Gdpr\Tests\TestCase;
use Modules\User\Models\BaseProfile;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('profile_extends_base_profile', function (): void {
<<<<<<< HEAD
    $profile = new Profile;
=======
    $profile = new Profile();
>>>>>>> laraxot/dev

    Assert::assertInstanceOf(BaseProfile::class, $profile);
});

test('profile_has_gdpr_connection', function (): void {
<<<<<<< HEAD
    $profile = new Profile;
=======
    $profile = new Profile();
>>>>>>> laraxot/dev

    Assert::assertSame('gdpr', $profile->getConnectionName());
});

test('profile_is_model', function (): void {
<<<<<<< HEAD
    $profile = new Profile;
=======
    $profile = new Profile();
>>>>>>> laraxot/dev

    Assert::assertInstanceOf(Model::class, $profile);
});

test('profile_has_standard_attributes', function (): void {
<<<<<<< HEAD
    $profile = new Profile;
=======
    $profile = new Profile();
>>>>>>> laraxot/dev

    Assert::assertTrue((new \ReflectionClass($profile))->hasMethod('user'));
});
