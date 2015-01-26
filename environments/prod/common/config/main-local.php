<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'pgsql:dbname=dc1u2612mb6v6r;host=ec2-54-221-249-3.compute-1.amazonaws.com;port=5432',
            'username' => 'kvkbxoulmfoitl',
            'password' => 'Ie8b4KURoF5wurHEjfmJGgzm-D',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
        ],
    ],
];
