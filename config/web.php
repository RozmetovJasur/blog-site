<?php

require_once dirname(__DIR__)."/helpers/conf.php";
$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db-local.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'name' => "true.uz",
    'version' => "1.0",
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'as AppBehavior' => 'app\behaviors\AppBehavior',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'JdAGdjC4HV1WGSYVowlfa7aq_ZKKz8ry',
            'baseUrl' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'class' => 'app\components\User',
            'identityCookie' => ['name' => '_user', 'httpOnly' => true],
            'idParam' => '__user_id',
            'identityClass' => 'app\models\UsersModel',
            'enableAutoLogin' => true,
            'loginUrl' => ['site/login'],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'class' => 'app\components\UrlManager',
            'rules'=>[
                'about' => 'site/about',
                'contact' => 'site/contact',
                'login' => 'site/login',
                'registration' => 'site/registration',
                '<controller:\w+>/<action:\w+>/<url>' => '<controller>/<action>',
                'articles/<url>/' => 'articles/index',
                '<controller>'=>'<controller>/index',
            ]
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => '@app/assets/jquery',
                    'js' => [
                        'js/jquery-3.2.1.min.js'
                    ]
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js'=>[]
                ],
            ]
        ],
        "i18n" => [
            'translations' => [
                'yii' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'sourceLanguage' => 'en-US'
                ],
                '*' => [
                    'class' => '\yii\i18n\GettextMessageSource',
                    'basePath' => '@app/messages',
                    'sourceLanguage' => 'uz'
                ]
            ]
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
