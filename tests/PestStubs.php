<?php

declare(strict_types=1);

namespace Pest\Laravel;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Response;
use Illuminate\Testing\TestResponse;
use Livewire\Features\SupportTesting\Testable;

/**
 * Stub per PHPStan — funzioni globali Pest Laravel.
 * Runtime: fornite da pestphp/pest-plugin-laravel.
 */

if (! function_exists('Pest\Laravel\get')) {
    /**
     * @param  array<string, string>  $headers
     * @return TestResponse<Response>
     */
    function get(string $uri, array $headers = []): TestResponse
    {
        throw new \RuntimeException('Stub not intended for runtime use');
    }
}

if (! function_exists('Pest\Laravel\post')) {
    /**
     * @param  array<string, mixed>  $data
     * @param  array<string, string>  $headers
     * @return TestResponse<Response>
     */
    function post(string $uri, array $data = [], array $headers = []): TestResponse
    {
        throw new \RuntimeException('Stub not intended for runtime use');
    }
}

if (! function_exists('actingAs')) {
    /**
     * @return TestResponse<Response>
     */
    function actingAs(Authenticatable $user, ?string $driver = null): TestResponse
    {
        throw new \RuntimeException('Stub not intended for runtime use');
    }
}

if (! function_exists('livewire')) {
    /**
     * @param  array<string, mixed>  $params
     * @return Testable<\Livewire\Component>
     */
    function livewire(string $component, array $params = []): Testable
    {
        throw new \RuntimeException('Stub not intended for runtime use');
    }
}
