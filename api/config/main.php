<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php')
);

return [
    'id' => 'app-api',
    'name' => 'Loyal App',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    //'timeZone' => 'Asia/Bahrain',
    'controllerNamespace' => 'api\controllers',

    
    'modules' => [
        'v1' => [
            'basePath' => '@app/modules/v1',
            'class' => 'api\modules\v1\Module',   // here is our v1 modules
           // 'defaultRoute' => 'app',
        ],
    ],
    
    'components' => [
        'response' => [
            'format' => yii\web\Response::FORMAT_JSON,
            'charset' => 'UTF-8',
            'class' => 'yii\web\Response',
            'on beforeSend' => function ($event) {
                $response = $event->sender;
                if ($response->data !== null && $response->statusCode !== 200) {
                    $response->data = [
                        'success' => $response->isSuccessful,
                        'status' => $response->statusCode,
                        'message' => $response->statusText,
                        'data' => $response->data,
                    ];
                    //$response->statusCode = 200;
                }
            },
        ],
        'user' => [
            'identityClass' => 'api\common\models\User',
            'enableAutoLogin' => false,
            'enableSession' => false,
           
            'loginUrl'=>false,
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
        'request' => [
            'enableCookieValidation' => false,
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
             // Disable index.php
            'showScriptName' => false,
            // Disable r= routes
            'enablePrettyUrl' => true,
            'enableStrictParsing' => false,
            /*'rules' => array(
                '<controller:\w+>' => '<controller>/index',    
                
            ),*/
            'rules' => [
                ['class' => 'yii\rest\UrlRule',
                'controller' => 'app'],
            ],
        ],
    ],
    'params' => $params,
];