<?php

declare(strict_types=1);

<<<<<<< HEAD
return [
    'fields' => [
        'id' => ['label' => 'id'],
        'created_at' => ['label' => 'created_at'],
        'updated_at' => ['label' => 'updated_at'],
        'first_name' => ['label' => 'first_name'],
        'last_name' => ['label' => 'last_name'],
        'email' => ['label' => 'email'],
        'phone' => ['label' => 'phone'],
        'is_active' => ['label' => 'is_active'],
        'type' => ['label' => 'type'],
=======
// Gdpr translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Gdpr/docs/wiki — domain i18n only.
// File: lang/it/profiles.php
return [
    'fields' => [
        'id' => [
            'label' => 'id',
        ],
        'created_at' => [
            'label' => 'created_at',
        ],
        'updated_at' => [
            'label' => 'updated_at',
        ],
>>>>>>> 12e4ae8 (chore: remove obsolete configuration and documentation files)
    ],
];
