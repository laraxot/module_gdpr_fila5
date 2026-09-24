<?php

declare(strict_types=1);

namespace Modules\Gdpr\Tests\Feature;

use Modules\Gdpr\Models\Profile;
use Modules\Gdpr\Models\Treatment;
use Modules\Gdpr\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

it('verifica che le classi corrette siano istanziabili', function (): void {
<<<<<<< .merge_file_ulrk4u
<<<<<<< HEAD
    expect(new Treatment())->not->toBeNull();
    expect(new Profile())->not->toBeNull();
=======
    expect(new Treatment())->toBeInstanceOf(Treatment::class);
    expect(new Profile())->toBeInstanceOf(Profile::class);
>>>>>>> 12e4ae8 (chore: remove obsolete configuration and documentation files)
=======
    Assert::assertInstanceOf(Treatment::class, new Treatment());
    Assert::assertInstanceOf(Profile::class, new Profile());
>>>>>>> .merge_file_9EQQyl
});

it('verifica che le proprietà delle classi siano accessibili', function (): void {
    $treatment = new Treatment();
    $profile = new Profile();

<<<<<<< .merge_file_ulrk4u
    // Verifica che le proprietà fillable siano definite
<<<<<<< HEAD
    expect($treatment->getFillable())->not->toBeNull();
    expect($profile->getFillable())->not->toBeNull();
=======
    expect($treatment->getFillable())->toBeArray();
    expect($profile->getFillable())->toBeArray();
>>>>>>> 12e4ae8 (chore: remove obsolete configuration and documentation files)

    // Verifica che la connessione al database sia definita correttamente
    expect($profile->getConnectionName())->toBe('gdpr');
=======
    Assert::assertIsArray($treatment->getFillable());
    Assert::assertIsArray($profile->getFillable());
    Assert::assertSame('gdpr', $profile->getConnectionName());
>>>>>>> .merge_file_9EQQyl
});
