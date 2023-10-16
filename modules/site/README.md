# Signupasalta Module
 
File has been created with `module/create` command. 
 
## Installation

In order to add the modules to your project go into the modules section of your config:

```php
return [
    'modules' => [
        // ...
        'signupasaltafrontend' => [
            'class' => 'app\modules\signupasalta\frontend\Module',
            'useAppViewPath' => true, // When enabled the views will be looked up in the @app/views folder, otherwise the views shipped with the module will be used.
        ],
        'signupasaltaadmin' => 'app\modules\signupasalta\admin\Module',
        // ...
    ],
];
```