<?php

declare(strict_types=1);

namespace Modules\Gdpr\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Modules\Gdpr\Models\BaseModel;
use Modules\Gdpr\Models\Treatment;
use Modules\Gdpr\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('treatment_fillable_attributes', function (): void {
<<<<<<< HEAD
    $treatment = new Treatment;
=======
    $treatment = new Treatment();
>>>>>>> laraxot/dev
    $fillable = $treatment->getFillable();

    assertFillableContains([
        'id',
        'active',
        'required',
        'name',
        'description',
        'documentVersion',
        'documentUrl',
        'weight',
    ], $fillable);
});

test('treatment_is_not_incrementing', function (): void {
<<<<<<< HEAD
    $treatment = new Treatment;
=======
    $treatment = new Treatment();
>>>>>>> laraxot/dev

    Assert::assertFalse($treatment->getIncrementing());
});

test('treatment_is_uuid', function (): void {
<<<<<<< HEAD
    $treatment = new Treatment;
=======
    $treatment = new Treatment();
>>>>>>> laraxot/dev
    $traits = class_uses_recursive($treatment);

    Assert::assertArrayHasKey(HasUuids::class, $traits);
});

test('treatment_extends_base_model', function (): void {
<<<<<<< HEAD
    $treatment = new Treatment;
=======
    $treatment = new Treatment();
>>>>>>> laraxot/dev

    Assert::assertInstanceOf(BaseModel::class, $treatment);
});
