<?php
return [
    'components' => [
        'request' => [
            'baseUrl' => '/admin',
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '',
        ],
        'urlManager' => [
            'baseUrl' => '/admin'
        ],
        'session' => [
            'name' => 'PHPFRONTSESSID',
            'savePath' => __DIR__ . '/../tmp',
        ]
    ],
];
