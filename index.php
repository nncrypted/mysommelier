<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/vendor/autoload.php');
require(__DIR__ . '/vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/config/web.php');

// Original app kickstart
// (new yii\web\Application($config))->run();

// New app kickstart includes mobile detection
$application = new yii\web\Application($config);

Yii::$app->on(\yii\base\Application::EVENT_BEFORE_REQUEST, function($event){
    Yii::$app->params['detect'] = [
        'isMobile' => Yii::$app->mobiledetect->isMobile(),
        'isTablet' => Yii::$app->mobiledetect->isTablet(),
    ];
});

$application->run();