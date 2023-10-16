<?php
namespace app\assets;

class PaymentAsset  extends \luya\web\Asset
{
    public $sourcePath = '@app/www/dist';

    public $css = [
        'loader/nprogress.css',
        'toastr/toaster.css',
    ];

    public $js = [
        'toastr/toastr.min.js',
        'loader/nprogress.js',
        'accounting.min.js',
        'https://js.stripe.com/v3/',
        'payment.js',
    ];

    public $publishOptions = [
        'only' => [
            'toastr/*',
            'loader/*',
            'accounting.min.js',
            'multi_items_payment.js',
            'payment.js',
        ],
    ];

    public $depends = [
        'app\assets\ResourcesAsset',
    ];
}
