<?php

$config = [
    'components' => [
        'request' => [
            'cookieValidationKey' => 'Ck7FtcDbllhxtQFLhngH3hs_gZAZmXkY',
            'baseUrl' => '/projects/lts',
        ],
        'urlManager' => [
            'baseUrl' => '/projects/lts'
        ],
        'session' => [
            'name' => 'PHPFRONTSESSID',
            'savePath' => __DIR__ . '/../tmp',
        ],
    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
