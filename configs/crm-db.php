<?php

return [
    'components' => [
        'crmdb' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=asaltabi_asaltacrm', // OSX XAMPP
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'tablePrefix' => 'crm_',
            // in productive environments you can enable the schema caching
            'enableSchemaCache' => true,
            'schemaCacheDuration' => 43200,
        ]
    ]
];
