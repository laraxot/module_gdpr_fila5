<?php

declare(strict_types=1);

namespace Modules\Gdpr\Tests\Feature;

use Modules\Gdpr\Models\Profile;
use Modules\Gdpr\Models\Treatment;
use Modules\Gdpr\Tests\TestCase;

ses(TestCase::class);

it('verifica che le classi corrette siano istanziabili', function (): void {
    // `toBeInstanceOf()` sul risultato di `new` e' una tautologia: il tipo e' gia'
    // garantito staticamente. Quello che vale la pena verificare e' che i due modelli
    // finiscano sulla connessione del modulo, non su quella di default.
    expect((new Treatment())->getConnectionName())->toBe('gdpr');
    expect((new Profile())->getConnectionName())->toBe('gdpr');
});

it('verifica che le proprietà delle classi siano accessibili', function (): void {
    $treatment = new Treatment();
    $profile = new Profile();

   // `getFillable()` dichiara gia' `array` come tipo di ritorno: verificare che sia un
    // array non prova nulla. Serve sapere che sia stato popolato.
    expect($treatment->getFillable())->not->toBeEmpty();
    expect($profile->getFillable())->not->toBeEmpty();

    // Verifica che la connessione al database sia definita correttamente
    expect($profile->getConnectionName())->toBe('gdpr');
});
