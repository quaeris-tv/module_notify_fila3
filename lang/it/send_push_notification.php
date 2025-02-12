<?php

return [
    'resource' => [
        'name' => 'Send',
    ],
    'navigation' => [
        'name' => 'firebase notification',
        'plural' => 'firebase notification',
        'group' => [
            'name' => 'Invia',
        ],
    ],
    'fields' => [
        'name' => [
            'label' => 'Nome Area',
        ],
        'parent' => 'Settore di appartenenza',
        'parent.name' => 'Settore di appartenenza',
        'parent_name' => 'Settore di appartenenza',
        'assets' => 'Quantità di asset',
        'deviceToken' => [
            'label' => 'deviceToken',
        ],
        'type' => [
            'label' => 'type',
        ],
        'title' => [
            'label' => 'title',
        ],
        'body' => [
            'label' => 'body',
        ],
        'data' => [
            'label' => 'data',
        ],
        'value' => [
            'label' => 'value',
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
