<?php return array (
    'navigation' => array (
        'name' => 'Template',
        'plural' => 'Template',
        'group' => array (
            'name' => 'Notifiche',
            'description' => 'Gestione dei template per le notifiche',
        ),
        'label' => 'Template',
        'sort' => 51,
        'icon' => 'notify-template-animated',
    ),
    'fields' => array (
        'name' => 'Nome Template',
        'description' => 'Descrizione',
        'subject' => 'Oggetto',
        'content' => 'Contenuto',
        'type' => array (
            'label' => 'Tipo',
            'email' => 'Email',
            'sms' => 'SMS',
            'push' => 'Push Notification',
            'in_app' => 'In-App',
        ),
        'variables' => array (
            'label' => 'Variabili Disponibili',
            'name' => 'Nome',
            'description' => 'Descrizione',
            'example' => 'Esempio',
        ),
        'status' => array (
            'label' => 'Stato',
            'active' => 'Attivo',
            'inactive' => 'Inattivo',
            'draft' => 'Bozza',
        ),
    ),
    'actions' => array (
        'preview' => 'Anteprima',
        'test' => 'Invia Test',
        'duplicate' => 'Duplica',
        'activate' => 'Attiva',
        'deactivate' => 'Disattiva',
    ),
    'messages' => array (
        'test_sent' => 'Email di test inviata con successo',
        'activated' => 'Template attivato con successo',
        'deactivated' => 'Template disattivato con successo',
        'duplicated' => 'Template duplicato con successo',
    ),
    'placeholders' => array (
        'name' => 'Es: Notifica Benvenuto',
        'subject' => 'Es: Benvenuto su {app_name}',
        'content' => 'Inserisci il contenuto del template...',
    ),
    'help' => array (
        'variables' => 'Usa {variable_name} per inserire variabili dinamiche',
        'preview' => 'Anteprima con dati di esempio',
        'html_support' => 'Supporto HTML disponibile',
    ),
);
