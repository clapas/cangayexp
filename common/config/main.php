<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
	    'rules' => [
	        '<lang:(es|de|no|ru)>' => '/',
                '<lang:(es|de|no|ru)>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>'
	    ]
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    //'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ]
    ],
    'as beforeRequest' => [
        'class' => common\components\LanguageFilter::className()
    ]
];
