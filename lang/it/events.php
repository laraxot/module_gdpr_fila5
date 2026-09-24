<?php

declare(strict_types=1);

<<<<<<< HEAD
return [
    'fields' => [
        'id' => ['label' => 'id'],
        'created_at' => ['label' => 'created_at'],
        'updated_at' => ['label' => 'updated_at'],
        'action' => ['label' => 'action'],
        'subject_id' => ['label' => 'subject_id'],
        'consent_id' => ['label' => 'consent_id'],
        'treatment_id' => ['label' => 'treatment_id'],
=======
// Gdpr translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Gdpr/docs/wiki — domain i18n only.
// File: lang/it/events.php
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
