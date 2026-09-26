<?php

declare(strict_types=1);

namespace Modules\Gdpr\Tests\Unit\Actions;

use Modules\Gdpr\Actions\Registration\HandleRegistrationErrorAction;
use Modules\Gdpr\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('HandleRegistrationErrorAction can be instantiated', function (): void {
<<<<<<< HEAD
    $action = new HandleRegistrationErrorAction;
=======
    $action = new HandleRegistrationErrorAction();
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(HandleRegistrationErrorAction::class, $action);
});

test('HandleRegistrationErrorAction execute method exists', function (): void {
<<<<<<< HEAD
    $action = new HandleRegistrationErrorAction;
=======
    $action = new HandleRegistrationErrorAction();
>>>>>>> laraxot/dev
    Assert::assertTrue((new \ReflectionClass($action))->hasMethod('execute'));
});
