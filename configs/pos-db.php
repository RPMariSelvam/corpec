<?php

return [
    'components' => [
        'posdb' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=asaltapossass', // OSX XAMPP
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'tablePrefix' => 'ims_',
            // in productive environments you can enable the schema caching
            'enableSchemaCache' => true,
            'schemaCacheDuration' => 43200,
        ]
    ]
];
