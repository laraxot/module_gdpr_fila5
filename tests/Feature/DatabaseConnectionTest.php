<?php

declare(strict_types=1);

namespace Tests\Modules\Gdpr\Feature;

use Tests\Modules\Gdpr\TestCase;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;

beforeEach(function (): void {
    /* @var \Tests\Modules\Gdpr\TestCase $this */
    User::query()->delete();
});

it('can access database connection', function (): void {
    $count = User::count();

    Assert::assertIsInt($count);
});

it('can create user via factory', function (): void {
    $user = UserFactory::new()->createOne([
        'email' => 'test@example.com',
        'first_name' => 'Test',
        'last_name' => 'User',
    ]);

    Assert::assertSame('test@example.com', $user->email);
});
