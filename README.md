# Firebase Cloud Messaging PHP Client Library

Install dulu dari composer:
```bash
>$ composer require amrikasir/firebasecmclient
```

baru deh di PHPnya.
```php
<?php
require_once __DIR__ . '/vendor/autoload.php';

use ald\FirebaseCM;
use ald\Push;

```

SET Push Parameter

```php
$push = new Push(
    "ALD Push Notification", //Title
    "dari: " . $_SERVER['HTTP_HOST'] //Message
);
```

SET Server Key

```php
$notification = new FirebaseCM(
    //this is key from server Firebase Cloud Messaging Console
    //and this is new Server key
    "SERVER_KEY_FROM_FCM_CONSOLE"

    //old legacy server key
    //"OR_LEGACY_SERVER_KEY"
);
```

Finaly...

SET Server Key

```php
echo $notification->send(
    //This is token from client (Android / iOS)
    //You can store this token in mysql server or other dbms
    array(
        'REGISTRATION_TOKEN',
        'OTHER_REGISTRATION_TOKEN'
    ),
    $push->getPush()
);
```
Dibuat untuk keperluan internal tim.

jika butuh, dan (kalau bisa) kembangkan menjadi lebih baik.
