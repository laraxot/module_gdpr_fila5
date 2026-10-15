<?php
namespace Modules\Gdpr\Tests\Unit;

use Modules\Gdpr\Tests\TestCase;
use Modules\Gdpr\Models\Profile;

it('has main model class', function () {
    expect(class_exists(Profile::class))->toBeTrue();
});
