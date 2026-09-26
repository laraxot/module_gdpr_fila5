<?php

declare(strict_types=1);

namespace Modules\Gdpr\Tests\Feature;

use Modules\Gdpr\Models\Profile;
use Modules\Gdpr\Models\Treatment;
use Modules\Gdpr\Tests\TestCase;

uses(TestCase::class);

it('verifica che le classi corrette siano istanziabili', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_ASNcsI
    expect(new Treatment())->toBeInstanceOf(Treatment::class);
    expect(new Profile())->toBeInstanceOf(Profile::class);
=======
    expect(new Treatment())->not->toBeNull();
    expect(new Profile())->not->toBeNull();
>>>>>>> laraxot/dev
});

it('verifica che le proprietà delle classi siano accessibili', function (): void {
    $treatment = new Treatment();
    $profile = new Profile();

    // Verifica che le proprietà fillable siano definite
<<<<<<< HEAD
    expect($treatment->getFillable())->toBeArray();
    expect($profile->getFillable())->toBeArray();
=======
    expect(new Treatment)->not->toBeNull();
    expect(new Profile)->not->toBeNull();
});

it('verifica che le proprietà delle classi siano accessibili', function (): void {
    $treatment = new Treatment;
    $profile = new Profile;

    // Verifica che le proprietà fillable siano definite
    expect($treatment->getFillable())->not->toBeNull();
    expect($profile->getFillable())->not->toBeNull();
>>>>>>> .merge_file_fKxYZU
=======
    expect($treatment->getFillable())->not->toBeNull();
    expect($profile->getFillable())->not->toBeNull();
>>>>>>> laraxot/dev

    // Verifica che la connessione al database sia definita correttamente
    expect($profile->getConnectionName())->toBe('gdpr');
});
