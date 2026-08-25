<?php

declare(strict_types=1);

namespace Modules\Gdpr\Tests\Unit\Actions;

use Illuminate\Validation\ValidationException;
use Modules\Gdpr\Actions\Validation\ValidateGdprConsentAction;
use Modules\Gdpr\Tests\TestCase;

<<<<<<< HEAD
ses(TestCase::class);
=======
uses(TestCase::class);
>>>>>>> laraxot/dev

test('ValidateGdprConsentAction passes with valid consents', function () {
    $action = new ValidateGdprConsentAction();

    gdprAssertDoesNotThrow(ValidationException::class, static fn () => $action->execute(true, true));
});

test('ValidateGdprConsentAction throws with false privacy', function () {
    $action = new ValidateGdprConsentAction();

<<<<<<< HEAD
   gdprAssertThrows(ValidationException::class, static fn () => $action->execute(false, true));
=======
    gdprAssertThrows(ValidationException::class, static fn () => $action->execute(false, true));
>>>>>>> laraxot/dev
});

test('ValidateGdprConsentAction throws with false terms', function () {
    $action = new ValidateGdprConsentAction();

<<<<<<< HEAD
   gdprAssertThrows(ValidationException::class, static fn () => $action->execute(true, false));
=======
    gdprAssertThrows(ValidationException::class, static fn () => $action->execute(true, false));
>>>>>>> laraxot/dev
});

test('ValidateGdprConsentAction throws with both false', function () {
    $action = new ValidateGdprConsentAction();

<<<<<<< HEAD
   gdprAssertThrows(ValidationException::class, static fn () => $action->execute(false, false));
=======
    gdprAssertThrows(ValidationException::class, static fn () => $action->execute(false, false));
>>>>>>> laraxot/dev
});
