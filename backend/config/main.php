<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'controllerMap' => [
        'cart'=>[
            'class'=>'worstinme\cart\controllers\AdminController',
            'access' => ['@'],
            'layout'=>'/main',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'backend\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'suffix' => '/',
            'rules' => [
            ],
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@worstinme/zoo/backend/views/layouts' => '@backend/views/layouts',
                    '@worstinme/widgets/views/layouts' => '@backend/views/layouts',
                ],
            ],
        ],
        'widgets' => [
            'class' => '\worstinme\widgets\Component',
            'backend' => true,
            'accessRoles' => ['@'],
        ],
        'assetManager' => [
            'forceCopy' => true,
            'appendTimestamp' => true,
        ],
    ],
    'params' => $params,
];
