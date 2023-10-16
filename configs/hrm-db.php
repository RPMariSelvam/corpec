<?php

return [
    'components' => [
        'hrmdb' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=asaltahrm', // OSX XAMPP
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'tablePrefix' => 'hrm_',
            // in productive environments you can enable the schema caching
            'enableSchemaCache' => true,
            'schemaCacheDuration' => 43200,
        ]
    ]
];
