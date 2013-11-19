<?php

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Tiny Blog Demo',

    'preload' => array('log'),

    'import' => array(
        'application.models.*',
        'application.forms.account.*',
        'application.components.*',
    ),

    'defaultController' => 'site',

    'components' => array(
        'user' => array(
            'class' => 'WebUser',
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        'db'=>array(
            'connectionString' => 'mysql:host=10.1.1.1;dbname=tiny-blog-demo',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
        ),
        'request' => array(
            // CsrfExemptRequest: disable CSRF validation for specific POST actions. (details: components/CsrfExemptRequest.php)
            'class' => 'CsrfExemptRequest',
            'enableCookieValidation' => true,
            'csrfTokenName' => 'CSRF_TOKEN',
            // CSRF-validation-disabled actions specified in noCsrfValidationRoutes.
            'noCsrfValidationRoutes' => array(
                'upload/image',
            ),
        ),
        'session' => array(
            'class' => 'ARedisSession',
        ),
        'errorHandler'=>array(
            'errorAction'=>'site/error',
        ),
        'urlManager' => array(
            'class' => 'UrlManager',
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                array('account/sign-in-get', 'pattern'=>'sign-in', 'verb'=>'GET'),
                array('account/sign-in-post', 'pattern'=>'sign-in', 'verb'=>'POST'),
                'post/<id:\d+>/<title:.*?>' => 'post/view',
                '<controller:[\w\-]+>/<action:[\w\-]+>' => '<controller>/<action>',
            ),
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),
        "redis" => array(
            "class" => 'ARedisConnection',
            "hostname" => "10.1.1.1",
            "port" => 6379,
            "database" => 0,
            "prefix" => "Yii.redis."
        ),
    ),

    'params' => require(dirname(__FILE__) . '/params.php'),
);
