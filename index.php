<?php
/*
|=================================================================
| Andalas Lintas Data
|=================================================================
| Push Notification
| Server Side: Al Amrikasir
| Client Test (Android): Rahmad Umarta
*/
require_once __DIR__ . '/vendor/autoload.php';

use ald\FirebaseCM;
use ald\Push;

$push = new Push(
    "ALD Push Notification", //Title
    "dari: " . $_SERVER['HTTP_HOST'] //Message
);

$notification = new FirebaseCM(
    //this is key from server Firebase Cloud Messaging Console
    //and this is new Server key
    "SERVER_KEY_FROM_FCM_CONSOLE"

    //old legacy server key
    //"AIzaSyAMdKQcZwnJa8PShAsQdORoGoT5D84Y01w"
);

echo $notification->send(
    //This is token from client (Android / iOS)
    //You can store this token in mysql server or other dbms
    array(
        'REGISTRATION_TOKEN',
        'OTHER_REGISTRATION_TOKEN'
    ),
    $push->getPush()
);