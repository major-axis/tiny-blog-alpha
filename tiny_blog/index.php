<?php

defined('YII_DEBUG') or define('YII_DEBUG',true);

// include packages from Composer
$autoload = dirname(__FILE__) . '/../vendor/autoload.php';
require($autoload);

$yii=dirname(__FILE__).'/../vendor/yiisoft/yii/framework/yii.php';
require_once($yii);

Yii::$classMap=array(
    'ARedisConnection' => dirname(__FILE__).'/../vendor/codemix/yiiredis/ARedisConnection.php',
    'ARedisSession' => dirname(__FILE__).'/../vendor/codemix/yiiredis/ARedisSession.php',
);

$config = dirname(__FILE__) . '/protected/config/main.php';
Yii::createWebApplication($config)->run();
