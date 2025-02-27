<?php

return [
    'resource' => [
<<<<<<< HEAD
        'name' => 'Invio Email',
    ],
    'navigation' => [
        'name' => 'Invio Email',
        'plural' => 'Invio Email',
        'group' => [
            'name' => 'Sistema',
            'description' => 'Funzionalità per l\'invio di email attraverso il sistema di notifiche',
        ],
        'label' => 'Invio Email',
        'icon' => 'notify-email-animated',
        'sort' => 49,
    ],
    'fields' => [
        'to' => [
            'label' => 'Destinatario',
        ],
        'subject' => [
            'label' => 'Oggetto',
        ],
        'body_html' => [
            'label' => 'Contenuto HTML',
        ],
    ],
    'actions' => [
        'send' => [
            'label' => 'Invia Email',
            'success' => 'Email inviata con successo',
            'error' => 'Errore durante l\'invio dell\'email',
        ],
        'preview' => [
            'label' => 'Anteprima',
=======
        'name' => 'send_email',
    ],
    'navigation' => [
        'name' => 'send_email',
        'plural' => 'send_email',
        'group' => [
            'name' => 'Invia',
        ],
    ],
    'fields' => [
        'name' => 'Nome Area',
        'parent' => 'Settore di appartenenza',
        'parent.name' => 'Settore di appartenenza',
        'parent_name' => 'Settore di appartenenza',
        'assets' => 'Quantità di asset',
        'to' => [
            'label' => 'to',
        ],
        'subject' => [
            'label' => 'subject',
        ],
        'body_html' => [
            'label' => 'body_html',
        ],
    ],
    'actions' => [
        'import' => [
            'name' => 'Importa da file',
            'fields' => [
                'import_file' => 'Seleziona un file XLS o CSV da caricare',
            ],
        ],
        'export' => [
            'name' => 'Esporta dati',
            'filename_prefix' => 'Aree al',
            'columns' => [
                'name' => 'Nome area',
                'parent_name' => 'Nome area livello superiore',
            ],
        ],
        'emailFormActions' => [
            'label' => 'emailFormActions',
>>>>>>> ea1c9cdf (up)
        ],
    ],
];
