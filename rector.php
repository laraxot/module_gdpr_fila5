<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;

/*
 * Rector del modulo Gdpr: set minimi e installati.
 * Niente PHPUnitLevelSetList (pacchetto assente) ne' LaravelSetList::LARAVEL_* deprecati:
 * il set Laravel si ottiene con RectorConfig::configure()->withComposerBased(laravel: true)
 * quando si vuole una run rector completa, non nel gate PHPStan del modulo.
 */
return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__,
    ]);

    $rectorConfig->skip([
        __DIR__.'/vendor',
        __DIR__.'/docs',
        '*/vendor',
        '*/docs',
    ]);

    /** @var list<string> $sets */
    $sets = [
        LevelSetList::UP_TO_PHP_81,
        SetList::TYPE_DECLARATION,
    ];

    $rectorConfig->sets($sets);

    $rectorConfig->importNames();
};
