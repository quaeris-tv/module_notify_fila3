<?php return array (
    'navigation' => array (
        'name' => 'Canali',
        'plural' => 'Canali',
        'group' => array (
            'name' => 'Notifiche',
            'description' => 'Gestione dei canali di notifica',
        ),
        'label' => 'Canali',
        'sort' => 52,
        'icon' => 'notify-channel-animated',
    ),
    'fields' => array (
        'name' => 'Nome Canale',
        'description' => 'Descrizione',
        'type' => array (
            'label' => 'Tipo',
            'email' => 'Email',
            'sms' => 'SMS',
            'push' => 'Push Notification',
            'webhook' => 'Webhook',
            'slack' => 'Slack',
            'telegram' => 'Telegram',
        ),
        'config' => array (
            'label' => 'Configurazione',
            'api_key' => 'API Key',
            'secret' => 'Secret',
            'from_email' => 'Email Mittente',
            'from_name' => 'Nome Mittente',
            'webhook_url' => 'URL Webhook',
        ),
        'status' => array (
            'label' => 'Stato',
            'active' => 'Attivo',
            'inactive' => 'Inattivo',
            'error' => 'Errore',
        ),
    ),
    'actions' => array (
        'test' => 'Test Connessione',
        'activate' => 'Attiva',
        'deactivate' => 'Disattiva',
        'clear_logs' => 'Pulisci Log',
    ),
    'messages' => array (
        'test_success' => 'Test di connessione completato con successo',
        'test_failed' => 'Test di connessione fallito',
        'activated' => 'Canale attivato con successo',
        'deactivated' => 'Canale disattivato con successo',
        'logs_cleared' => 'Log puliti con successo',
    ),
    'validation' => array (
        'api_key_required' => 'API Key richiesta per questo canale',
        'webhook_url_invalid' => 'URL Webhook non valido',
        'email_invalid' => 'Indirizzo email non valido',
    ),
);
