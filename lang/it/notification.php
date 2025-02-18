<?php return array (
  'navigation' => 
  array (
    'name' => 'Notifiche',
    'plural' => 'Notifiche',
    'group' => 
    array (
      'name' => 'Notifiche',
      'description' => 'Gestione delle notifiche e comunicazioni',
    ),
    'label' => 'Notifiche',
    'sort' => 40,
    'icon' => 'notify-notification-animated',
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
  ),
  'actions' => 
  array (
    'mark_as_read' => 'Segna come letta',
    'mark_as_unread' => 'Segna come non letta',
    'archive' => 'Archivia',
    'unarchive' => 'Ripristina',
    'delete' => 'Elimina',
  ),
  'messages' => 
  array (
    'no_notifications' => 'Nessuna notifica',
    'mark_all_read' => 'Segna tutte come lette',
    'archive_all' => 'Archivia tutte',
    'delete_all' => 'Elimina tutte',
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