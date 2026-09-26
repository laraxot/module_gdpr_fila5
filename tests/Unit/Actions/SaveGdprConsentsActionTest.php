<?php

declare(strict_types=1);

namespace Modules\Gdpr\Tests\Unit\Actions;

use Modules\Gdpr\Actions\SaveGdprConsentsAction;
use Modules\Gdpr\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('SaveGdprConsentsAction can be instantiated', function (): void {
<<<<<<< HEAD
    $action = new SaveGdprConsentsAction;
=======
    $action = new SaveGdprConsentsAction();
>>>>>>> laraxot/dev
    Assert::assertInstanceOf(SaveGdprConsentsAction::class, $action);
});

test('SaveGdprConsentsAction execute method exists', function (): void {
<<<<<<< HEAD
    $action = new SaveGdprConsentsAction;
=======
    $action = new SaveGdprConsentsAction();
>>>>>>> laraxot/dev
    Assert::assertTrue((new \ReflectionClass($action))->hasMethod('execute'));
});
