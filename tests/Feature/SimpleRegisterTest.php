<?php

declare(strict_types=1);

namespace Tests\Modules\Gdpr\Feature;

it('can render registration page', function (): void {
    $response = gdprGet('/en/auth/register');
    $response->assertStatus(200);
});
