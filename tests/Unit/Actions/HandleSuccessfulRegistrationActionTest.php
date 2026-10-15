<?php

declare(strict_types=1);

namespace Tests\Modules\Gdpr\Unit\Actions;

use Modules\Gdpr\Actions\Registration\HandleSuccessfulRegistrationAction;
use PHPUnit\Framework\Assert;

test('HandleSuccessfulRegistrationAction can be instantiated', function (): void {
    $action = new HandleSuccessfulRegistrationAction();
    Assert::assertInstanceOf(HandleSuccessfulRegistrationAction::class, $action);
});

test('HandleSuccessfulRegistrationAction execute method exists', function (): void {
    $action = new HandleSuccessfulRegistrationAction();
    Assert::assertTrue((new \ReflectionClass($action))->hasMethod('execute'));
});
