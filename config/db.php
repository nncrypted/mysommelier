<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=wine_cellar',
    'username' => 'jim',
    'password' => 'fodder',
    'charset' => 'utf8',
	'enableSchemaCache' => TRUE,
	'schemaCacheDuration' => 3600,
	'schemaCache' => 'wine_cellar',
];
