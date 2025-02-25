<<<<<<< HEAD
<?php

return [
    'navigation' => [
        'group' => 'Sistema',
        'label' => 'Gestione Notifiche',
        'icon' => 'notify-notification-animated',
        'sort' => 46,
        'description' => 'Gestione centralizzata delle notifiche di sistema',
    ],
    'fields' => [
        'title' => 'Titolo',
        'message' => 'Messaggio',
        'type' => [
            'label' => 'Tipo',
            'system' => 'Sistema',
            'alert' => 'Avviso',
            'info' => 'Informazione',
            'success' => 'Successo',
            'warning' => 'Attenzione',
            'error' => 'Errore',
        ],
        'status' => [
            'label' => 'Stato',
            'unread' => 'Non letta',
            'read' => 'Letta',
            'archived' => 'Archiviata',
        ],
        'recipient' => 'Destinatario',
        'sent_at' => 'Inviata il',
        'read_at' => 'Letta il',
        'archived_at' => 'Archiviata il',
        'channel' => [
            'label' => 'Canale',
            'tooltip' => 'Canale di invio della notifica',
            'help' => 'Seleziona il canale attraverso cui inviare la notifica',
            'options' => [
                'email' => [
                    'label' => 'Email',
                    'tooltip' => 'Invia tramite email',
                ],
                'sms' => [
                    'label' => 'SMS',
                    'tooltip' => 'Invia tramite SMS',
                ],
                'push' => [
                    'label' => 'Push',
                    'tooltip' => 'Invia come notifica push',
                ],
                'telegram' => [
                    'label' => 'Telegram',
                    'tooltip' => 'Invia tramite Telegram',
                ],
            ],
        ],
        'template' => [
            'label' => 'Template',
            'tooltip' => 'Template da utilizzare per la notifica',
            'help' => 'Scegli il modello predefinito per questa notifica',
            'options' => [
                'subject' => [
                    'label' => 'Oggetto',
                    'tooltip' => 'Oggetto della notifica',
                    'placeholder' => 'es: Notifica importante',
                ],
                'body' => [
                    'label' => 'Corpo',
                    'tooltip' => 'Contenuto principale della notifica',
                    'placeholder' => 'Inserisci il testo della notifica...',
                ],
                'variables' => [
                    'label' => 'Variabili disponibili',
                    'tooltip' => 'Variabili che possono essere utilizzate nel template',
                    'help' => 'Usa {variable} per inserire valori dinamici',
                ],
            ],
        ],
        'schedule' => [
            'label' => 'Programmazione',
            'tooltip' => 'Quando inviare la notifica',
            'help' => 'Imposta quando la notifica deve essere inviata',
            'options' => [
                'immediate' => [
                    'label' => 'Immediata',
                    'tooltip' => 'Invia subito la notifica',
                ],
                'scheduled' => [
                    'label' => 'Programmata',
                    'tooltip' => 'Programma l\'invio per una data specifica',
                ],
                'date' => [
                    'label' => 'Data',
                    'tooltip' => 'Data di invio programmato',
                    'placeholder' => 'es: 01/01/2024',
                ],
                'time' => [
                    'label' => 'Ora',
                    'tooltip' => 'Ora di invio programmato',
                    'placeholder' => 'es: 14:30',
                ],
            ],
        ],
    ],
    'actions' => [
        'mark_as_read' => 'Segna come letta',
        'mark_as_unread' => 'Segna come non letta',
        'archive' => 'Archivia',
        'unarchive' => 'Ripristina',
        'delete' => 'Elimina',
        'send_test' => [
            'label' => 'Invia test',
            'tooltip' => 'Invia una notifica di test',
            'icon' => 'heroicon-o-paper-airplane',
            'color' => 'info',
            'confirmation' => [
                'title' => 'Conferma invio test',
                'message' => 'Vuoi inviare una notifica di test?',
                'confirm' => 'Sì, invia test',
                'cancel' => 'No, annulla',
            ],
        ],
        'preview' => [
            'label' => 'Anteprima',
            'tooltip' => 'Visualizza anteprima della notifica',
            'icon' => 'heroicon-o-eye',
            'color' => 'primary',
        ],
        'schedule' => [
            'label' => 'Programma',
            'tooltip' => 'Programma l\'invio della notifica',
            'icon' => 'heroicon-o-clock',
            'color' => 'success',
            'confirmation' => [
                'title' => 'Conferma programmazione',
                'message' => 'Vuoi programmare l\'invio di questa notifica?',
                'confirm' => 'Sì, programma',
                'cancel' => 'No, annulla',
            ],
        ],
    ],
    'messages' => [
        'no_notifications' => 'Nessuna notifica',
        'mark_all_read' => 'Segna tutte come lette',
        'archive_all' => 'Archivia tutte',
        'delete_all' => 'Elimina tutte',
        'test_sent' => [
            'title' => 'Test Inviato',
            'message' => 'La notifica di test è stata inviata con successo',
        ],
        'scheduled' => [
            'title' => 'Programmazione Completata',
            'message' => 'Notifica programmata per il :date alle :time',
        ],
    ],
    'filters' => [
        'all' => 'Tutte',
        'unread' => 'Non lette',
        'read' => 'Lette',
        'archived' => 'Archiviate',
        'type' => 'Tipo',
        'date' => 'Data',
    ],
    'badges' => [
        'unread' => 'Non letta',
        'priority' => [
            'high' => 'Alta priorità',
            'medium' => 'Media priorità',
            'low' => 'Bassa priorità',
        ],
    ],
];
=======
<?php return array (
  'navigation' => 
  array (
    'group' => 'Sistema',
    'label' => 'Gestione Notifiche',
    'icon' => 'notify-notification-animated',
    'sort' => 46,
    'description' => 'Gestione centralizzata delle notifiche di sistema',
  ),
  'fields' => 
  array (
    'title' => 'Titolo',
    'message' => 'Messaggio',
    'type' => 
    array (
      'label' => 'Tipo',
      'system' => 'Sistema',
      'alert' => 'Avviso',
      'info' => 'Informazione',
      'success' => 'Successo',
      'warning' => 'Attenzione',
      'error' => 'Errore',
    ),
    'status' => 
    array (
      'label' => 'Stato',
      'unread' => 'Non letta',
      'read' => 'Letta',
      'archived' => 'Archiviata',
    ),
    'recipient' => 'Destinatario',
    'sent_at' => 'Inviata il',
    'read_at' => 'Letta il',
    'archived_at' => 'Archiviata il',
    'channel' => 
    array (
      'label' => 'Canale',
      'tooltip' => 'Canale di invio della notifica',
      'help' => 'Seleziona il canale attraverso cui inviare la notifica',
      'options' => 
      array (
        'email' => 
        array (
          'label' => 'Email',
          'tooltip' => 'Invia tramite email',
        ),
        'sms' => 
        array (
          'label' => 'SMS',
          'tooltip' => 'Invia tramite SMS',
        ),
        'push' => 
        array (
          'label' => 'Push',
          'tooltip' => 'Invia come notifica push',
        ),
        'telegram' => 
        array (
          'label' => 'Telegram',
          'tooltip' => 'Invia tramite Telegram',
        ),
      ),
    ),
    'template' => 
    array (
      'label' => 'Template',
      'tooltip' => 'Template da utilizzare per la notifica',
      'help' => 'Scegli il modello predefinito per questa notifica',
      'options' => 
      array (
        'subject' => 
        array (
          'label' => 'Oggetto',
          'tooltip' => 'Oggetto della notifica',
          'placeholder' => 'es: Notifica importante',
        ),
        'body' => 
        array (
          'label' => 'Corpo',
          'tooltip' => 'Contenuto principale della notifica',
          'placeholder' => 'Inserisci il testo della notifica...',
        ),
        'variables' => 
        array (
          'label' => 'Variabili disponibili',
          'tooltip' => 'Variabili che possono essere utilizzate nel template',
          'help' => 'Usa {variable} per inserire valori dinamici',
        ),
      ),
    ),
    'schedule' => 
    array (
      'label' => 'Programmazione',
      'tooltip' => 'Quando inviare la notifica',
      'help' => 'Imposta quando la notifica deve essere inviata',
      'options' => 
      array (
        'immediate' => 
        array (
          'label' => 'Immediata',
          'tooltip' => 'Invia subito la notifica',
        ),
        'scheduled' => 
        array (
          'label' => 'Programmata',
          'tooltip' => 'Programma l\'invio per una data specifica',
        ),
        'date' => 
        array (
          'label' => 'Data',
          'tooltip' => 'Data di invio programmato',
          'placeholder' => 'es: 01/01/2024',
        ),
        'time' => 
        array (
          'label' => 'Ora',
          'tooltip' => 'Ora di invio programmato',
          'placeholder' => 'es: 14:30',
        ),
      ),
    ),
    'applyFilters' => 
    array (
      'label' => 'applyFilters',
    ),
  ),
  'actions' => 
  array (
    'mark_as_read' => 'Segna come letta',
    'mark_as_unread' => 'Segna come non letta',
    'archive' => 'Archivia',
    'unarchive' => 'Ripristina',
    'delete' => 'Elimina',
    'send_test' => 
    array (
      'label' => 'Invia test',
      'tooltip' => 'Invia una notifica di test',
      'icon' => 'heroicon-o-paper-airplane',
      'color' => 'info',
      'confirmation' => 
      array (
        'title' => 'Conferma invio test',
        'message' => 'Vuoi inviare una notifica di test?',
        'confirm' => 'Sì, invia test',
        'cancel' => 'No, annulla',
      ),
    ),
    'preview' => 
    array (
      'label' => 'Anteprima',
      'tooltip' => 'Visualizza anteprima della notifica',
      'icon' => 'heroicon-o-eye',
      'color' => 'primary',
    ),
    'schedule' => 
    array (
      'label' => 'Programma',
      'tooltip' => 'Programma l\'invio della notifica',
      'icon' => 'heroicon-o-clock',
      'color' => 'success',
      'confirmation' => 
      array (
        'title' => 'Conferma programmazione',
        'message' => 'Vuoi programmare l\'invio di questa notifica?',
        'confirm' => 'Sì, programma',
        'cancel' => 'No, annulla',
      ),
    ),
  ),
  'messages' => 
  array (
    'no_notifications' => 'Nessuna notifica',
    'mark_all_read' => 'Segna tutte come lette',
    'archive_all' => 'Archivia tutte',
    'delete_all' => 'Elimina tutte',
    'test_sent' => 
    array (
      'title' => 'Test Inviato',
      'message' => 'La notifica di test è stata inviata con successo',
    ),
    'scheduled' => 
    array (
      'title' => 'Programmazione Completata',
      'message' => 'Notifica programmata per il :date alle :time',
    ),
  ),
  'filters' => 
  array (
    'all' => 'Tutte',
    'unread' => 'Non lette',
    'read' => 'Lette',
    'archived' => 'Archiviate',
    'type' => 'Tipo',
    'date' => 'Data',
  ),
  'badges' => 
  array (
    'unread' => 'Non letta',
    'priority' => 
    array (
      'high' => 'Alta priorità',
      'medium' => 'Media priorità',
      'low' => 'Bassa priorità',
    ),
  ),
);
>>>>>>> a0968c36181bbbf89402378b0d4780fc9fe9a91c
