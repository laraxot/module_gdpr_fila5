<?php

declare(strict_types=1);

// Gdpr translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Gdpr/docs/wiki — domain i18n only.
// File: lang/de/profile.php
return [
    'navigation' => [
        'name' => 'Profili Privacy',
        'plural' => 'Profili Privacy',
        'group' => [
            'name' => 'GDPR',
            'description' => 'Gestione dei profili di privacy degli utenti',
        ],
        'label' => 'Profili Privacy',
        'sort' => '22',
        'icon' => 'gdpr-profile',
    ],
    'fields' => [
        'user' => [
            'label' => 'Utente',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'preferences' => [
            'label' => 'Preferenze',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'marketing_consent' => [
            'label' => 'Consenso Marketing',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'analytics_consent' => [
            'label' => 'Consenso Analytics',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'third_party_consent' => [
            'label' => 'Consenso Terze Parti',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'last_updated' => [
            'label' => 'Ultimo Aggiornamento',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'applyFilters' => [
            'label' => 'applyFilters',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'toggleColumns' => [
            'label' => 'toggleColumns',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'preferences' => [
        'communication' => 'Preferenze Comunicazione',
        'data_retention' => 'Conservazione Dati',
        'data_sharing' => 'Condivisione Dati',
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'actions' => [
    ],
];
