<?php

return [
    'resource' => [
        'name' => 'notification',
    ],
    'navigation' => [
        'name' => 'notification',
        'plural' => 'notifications',  // Modificato in "notifications" per coerenza plurale
        'group' => [
            'name' => 'Admin',
        ],
        'label' => 'notification',
    ],
    'fields' => [
        'name' => 'Nome Area',
        'parent' => 'Settore di appartenenza',
        'parent.name' => 'Settore di appartenenza',
        'parent_name' => 'Settore di appartenenza',
        'assets' => 'Quantità di asset',
        'type' => [
            'name' => 'Tipo',  // Aggiunta una descrizione per "type"
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
    ],
];
