<?php
namespace Modules\Gdpr\Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return array_merge(parent::getPackageProviders($app), [
            \Nwidart\Modules\LaravelModulesServiceProvider::class,
            \Modules\Gdpr\Providers\GdprServiceProvider::class,
        ]);
    }
}
