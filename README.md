# Module Notify
Modulo dedicato alla gestione delle notifiche (email, sms, altro)

## Aggiungere Modulo nella base del progetto
Dentro la cartella laravel/Modules

```bash
git submodule add https://github.com/laraxot/module_notify_fila3.git Notify
```

## Verificare che il modulo sia attivo
```bash
php artisan module:list
```
in caso abilitarlo
```bash
php artisan module:enable Notify
```

## Eseguire le migrazioni
```bash
php artisan module:migrate Notify
```


## Test di prova per invio email

## [Test smtp page](docs/test-smtp-page.md)