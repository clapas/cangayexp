<?php
return [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'pgsql:dbname=dc1u2612mb6v6r;host=ec2-54-221-249-3.compute-1.amazonaws.com;port=5432',
            'username' => 'kvkbxoulmfoitl',
            'password' => 'Ie8b4KURoF5wurHEjfmJGgzm-D',
            'charset' => 'utf8',
        ],
        'session' => [
            'name' => 'PHPFRONTSESSID',
            'savePath' => __DIR__ . '/../tmp',
        ],
    ],
];
