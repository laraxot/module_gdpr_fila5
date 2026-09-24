<?php

declare(strict_types=1);

namespace Modules\Gdpr\Tests\Feature;

use Modules\Gdpr\Models\Profile;
use Modules\Gdpr\Models\Treatment;
use Modules\Gdpr\Tests\TestCase;

uses(TestCase::class);

it('verifica che le classi corrette siano istanziabili', function (): void {
<<<<<<< HEAD
    expect(new Treatment())->not->toBeNull();
    expect(new Profile())->not->toBeNull();
=======
    expect(new Treatment())->toBeInstanceOf(Treatment::class);
    expect(new Profile())->toBeInstanceOf(Profile::class);
>>>>>>> 12e4ae8 (chore: remove obsolete configuration and documentation files)
});

it('verifica che le proprietà delle classi siano accessibili', function (): void {
    $treatment = new Treatment();
    $profile = new Profile();

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
});
