<?php

declare(strict_types=1);

namespace Tests\Modules\Gdpr\Unit\Actions;

use Modules\Gdpr\Actions\SaveGdprConsentsAction;
use PHPUnit\Framework\Assert;

test('SaveGdprConsentsAction can be instantiated', function (): void {
    $action = new SaveGdprConsentsAction();
    Assert::assertInstanceOf(SaveGdprConsentsAction::class, $action);
});

test('SaveGdprConsentsAction execute method exists', function (): void {
    $action = new SaveGdprConsentsAction();
    Assert::assertTrue((new \ReflectionClass($action))->hasMethod('execute'));
});
