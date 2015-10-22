<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
  
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
             'transport' => [
             'class' => 'Swift_SmtpTransport',
             'host' => 'smtp-20.1gb.ru',  // e.g. smtp.mandrillapp.com or smtp.gmail.com
             'username' => 'u427467',
             'password' => '7d801970456',
             'port' => '25', // Port 25 is a very common port too
  //'encryption' => 'tls', // It is often used, check your provider or mail server
             ],  
        ],   
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
