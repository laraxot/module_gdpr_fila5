<?php

declare(strict_types=1);

namespace Modules\Gdpr\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Modules\Gdpr\Models\Consent;
use Modules\Gdpr\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('consent_fillable_attributes', function (): void {
<<<<<<< HEAD
    $consent = new Consent;
=======
    $consent = new Consent();
>>>>>>> laraxot/dev
    $fillable = $consent->getFillable();

    assertFillableContains([
        'subject_id',
        'treatment_id',
        'user_id',
        'user_type',
        'type',
        'accepted_at',
    ], $fillable);
});

test('consent_has_treatment_relationship_method', function (): void {
<<<<<<< HEAD
    $consent = new Consent;
=======
    $consent = new Consent();
>>>>>>> laraxot/dev

    Assert::assertTrue((new \ReflectionClass($consent))->hasMethod('treatment'));
});

test('consent_is_not_incrementing', function (): void {
<<<<<<< HEAD
    $consent = new Consent;
=======
    $consent = new Consent();
>>>>>>> laraxot/dev

    Assert::assertFalse($consent->getIncrementing());
});

test('consent_is_uuid', function (): void {
<<<<<<< HEAD
    $consent = new Consent;
=======
    $consent = new Consent();
>>>>>>> laraxot/dev
    $traits = class_uses_recursive($consent);

    Assert::assertArrayHasKey(HasUuids::class, $traits);
});
