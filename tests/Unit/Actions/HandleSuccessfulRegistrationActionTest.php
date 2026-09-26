<?php

declare(strict_types=1);

namespace Modules\Gdpr\Tests\Unit\Actions;

use Modules\Gdpr\Actions\Registration\HandleSuccessfulRegistrationAction;
use Modules\Gdpr\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('HandleSuccessfulRegistrationAction can be instantiated', function (): void {
<<<<<<< HEAD
    $action = new HandleSuccessfulRegistrationAction;
=======
    $action = new HandleSuccessfulRegistrationAction();
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(HandleSuccessfulRegistrationAction::class, $action);
});

test('HandleSuccessfulRegistrationAction execute method exists', function (): void {
<<<<<<< HEAD
    $action = new HandleSuccessfulRegistrationAction;
=======
    $action = new HandleSuccessfulRegistrationAction();
>>>>>>> laraxot/dev
    Assert::assertTrue((new \ReflectionClass($action))->hasMethod('execute'));
});
