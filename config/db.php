<?php

return [
    'class' => 'yii\db\Connection',
    // localhost makes PHP try a UNIX socket, which XAMPP doesn't always support on Mac.
    // 127.0.0.1 forces a TCP connection, which always works.
    'dsn' => 'mysql:host=127.0.0.1;dbname=lucky_shares',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
