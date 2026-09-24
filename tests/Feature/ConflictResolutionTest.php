<?php

declare(strict_types=1);

<<<<<<< HEAD
namespace Modules\Gdpr\Tests\Feature;

use Modules\Gdpr\Models\Profile;
use Modules\Gdpr\Models\Treatment;
use Modules\Gdpr\Tests\TestCase;
=======
use Modules\Gdpr\Models\Profile;
use Modules\Gdpr\Models\Treatment;
use Modules\Gdpr\Tests\TestCase;
use PHPUnit\Framework\Assert;
>>>>>>> 12e4ae8 (chore: remove obsolete configuration and documentation files)

uses(TestCase::class);

it('verifica che le classi corrette siano istanziabili', function (): void {
<<<<<<< HEAD
    // `new X()` restituisce per costruzione un X: il fatto verificabile e' che i due
    // model si costruiscano senza parametri obbligatori.
    expect((new \ReflectionClass(Treatment::class))->getConstructor()?->getNumberOfRequiredParameters() ?? 0)->toBe(0);
    expect((new \ReflectionClass(Profile::class))->getConstructor()?->getNumberOfRequiredParameters() ?? 0)->toBe(0);
=======
    Assert::assertInstanceOf(Treatment::class, new Treatment());
    Assert::assertInstanceOf(Profile::class, new Profile());
>>>>>>> 12e4ae8 (chore: remove obsolete configuration and documentation files)
});

it('verifica che le proprietà delle classi siano accessibili', function (): void {
    $treatment = new Treatment();
    $profile = new Profile();

<<<<<<< HEAD
    // `getFillable()` dichiara gia' array: cio' che conta e' che non sia vuoto,
    // altrimenti nessun attributo e' assegnabile in massa.
    expect($treatment->getFillable())->not->toBeEmpty();
    expect($profile->getFillable())->not->toBeEmpty();

    // Verifica che la connessione al database sia definita correttamente
    expect($profile->getConnectionName())->toBe('gdpr');
=======
    Assert::assertIsArray($treatment->getFillable());
    Assert::assertIsArray($profile->getFillable());
    Assert::assertSame('gdpr', $profile->getConnectionName());
>>>>>>> 12e4ae8 (chore: remove obsolete configuration and documentation files)
});
