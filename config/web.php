<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'app-practical-b',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'MyuEp5JymPDNWBMRX26AN0JqBNGDooNv',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'mobiledetect' => [
	        'class' => 'dkeeper\mobiledetect\Detect',
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
//			'transport' => [
//				'class' => 'Swift_SmtpTransport',
//				'host' => 'mail.krethweb.org',
//				'username' => 'sommelier@krethweb.org',
//				'password' => 'F0dder99!',
//				'port' => '995',
//				'encryption' => 'ssl',
//			],
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
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
	    'formatter' => [
			'class' => 'yii\i18n\Formatter',
			'nullDisplay' => '',
		],
    ],
	'modules' => [
		'user' => [
			'class' => 'dektrium\user\Module',
			'enableUnconfirmedLogin' => true,
			'confirmWithin' => 21600,
			'cost' => 12,
			'admins' => ['admin', 'jim']
		],
		'attachments' => [
			'class' => nemmo\attachments\Module::className(),
			'tempPath' => '@app/uploads/temp',
			'storePath' => '@app/uploads/images',
			'rules' => [ // Rules according to the FileValidator
				'maxFiles' => 3, // Allow to upload maximum 3 files, default to 3
				'mimeTypes' => 'image/jpeg', // Only jpg images
				'maxSize' => 1024 * 1024 * 4 // 4 MB
			]
		],
		'gridview' => [
            'class' => 'kartik\grid\Module',
        ],
		'datecontrol' =>  [
            'class' => 'kartik\datecontrol\Module',
 
            // format settings for displaying each date attribute
            'displaySettings' => [
                'date' => 'MM-dd-yyyy',
                'time' => 'H:i:s A',
                'datetime' => 'MM-dd-yyyy H:i:s A',
            ],
 
            // format settings for saving each date attribute
            'saveSettings' => [
                'date' => 'Y-m-d', 
                'time' => 'H:i:s',
                'datetime' => 'Y-m-d H:i:s',
            ],
 
            // automatically use kartik\widgets for each of the above formats
            'autoWidget' => true,
        ],
	],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
//    $config['modules']['gii'] = 'yii\gii\Module';
	$config['modules']['gii']['class'] = 'yii\gii\Module';
	$config['modules']['gii']['generators'] = [
        'kartikgii-crud' => ['class' => 'warrence\kartikgii\crud\Generator'],
    ];
}

return $config;
