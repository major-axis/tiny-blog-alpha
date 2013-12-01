<?php

$debug = true;


$applicationDir = realpath(dirname(__FILE__) . '/..');
$vendorDir = realpath(dirname(__FILE__) . '/../../vendor');


if($debug)
{
    defined('YII_DEBUG') or define('YII_DEBUG',true);
    defined('YII_ENABLE_EXCEPTION_HANDLER') or define('YII_ENABLE_EXCEPTION_HANDLER',true);
    defined('YII_ENABLE_ERROR_HANDLER') or define('YII_ENABLE_ERROR_HANDLER',true);
}

$yii = $vendorDir . '/yiisoft/yii/framework/yii.php';
require_once($yii);


// include packages managed by Composer
$autoload = $vendorDir . '/autoload.php';
require($autoload);


if(!$debug)
{
    $dsn = 'http://public:secret@example.com/1';
    
    $client = new Raven_Client($dsn);
    $error_handler = new Raven_ErrorHandler($client);
    $error_handler->registerExceptionHandler();
    $error_handler->registerErrorHandler();
    $error_handler->registerShutdownFunction();
}


Yii::setPathOfAlias('vendor', $vendorDir);
$config = $applicationDir . '/config/main.php';
Yii::createWebApplication($config)->run();
