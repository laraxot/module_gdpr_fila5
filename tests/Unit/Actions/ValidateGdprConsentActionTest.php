<?php

declare(strict_types=1);

namespace Modules\Gdpr\Tests\Unit\Actions;

use Illuminate\Validation\ValidationException;
use Modules\Gdpr\Actions\Validation\ValidateGdprConsentAction;
use Modules\Gdpr\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('ValidateGdprConsentAction passes with valid consents', function (): void {
    $action = new ValidateGdprConsentAction();

    Assert::assertNull($action->execute(true, true));
});

test('ValidateGdprConsentAction throws with false privacy', function (): void {
    $action = new ValidateGdprConsentAction();

    gdprAssertThrows(ValidationException::class, static fn () => $action->execute(false, true));
});

test('ValidateGdprConsentAction throws with false terms', function (): void {
    $action = new ValidateGdprConsentAction();

    gdprAssertThrows(ValidationException::class, static fn () => $action->execute(true, false));
});

test('ValidateGdprConsentAction throws with both false', function (): void {
    $action = new ValidateGdprConsentAction();

    gdprAssertThrows(ValidationException::class, static fn () => $action->execute(false, false));
});
