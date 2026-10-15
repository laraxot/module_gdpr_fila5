<?php

declare(strict_types=1);

return [
    'title' => 'Cancellazione account',
    'subtitle' => 'Diritto alla cancellazione (art. 17 GDPR)',
    'warning' => 'Attenzione',
    'warning_text' => "La cancellazione non e' immediata e non elimina fisicamente i dati: l'account viene soft-deleted per conservare l'audit trail (art. 30 GDPR). Tutti i consensi vengono revocati. I dati personali trattenuti sono quelli strettamente necessari per adempiere a obblighi di legge.",
    'reason_label' => 'Motivazione (opzionale)',
    'confirm_label' => 'Per confermare, scrivi :word',
    'confirm_word' => 'cancella',
    'confirm_placeholder' => 'cancella',
    'cancel' => 'Annulla',
    'submit' => 'Cancella il mio account',
    'success' => 'Account cancellato correttamente.',
    'flash' => [
        'account_deleted' => 'Account cancellato correttamente. I consensi sono stati revocati e i dati sono stati soft-deleted secondo l\'art. 17 GDPR.',
    ],
];