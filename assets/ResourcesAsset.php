<?php

namespace app\assets;

/**
 * Application Asset File.
 */
class ResourcesAsset extends \luya\web\Asset
{
    // public $sourcePath = '@app/www/dist';
    public $basePath = '@webroot';
    public $baseUrl = '@web/dist/';
    // public $basePath = '@app/';
    public $css = [
        'all.css',
        //'css/raleway.css',
        //'css/animation.css',
        //'css/font-awesome.css',
        //'css/headhesive.css',
        //'css/slick-slider.css',
        //'css/slider.css',
        //'css/jquery.fancybox.css',
        //'css/jquery.fancybox-buttons.css',
        //'css/jquery.fancybox-thumbs.css',
        //'css/plugins/datatable/TableTools.css',
        //'css/styletable.css',
        //'css/bootstrap.min.css',
        // '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css',
    ];

    public $js = [
        'all.js',
       // 'js/mobile-detect.min.js',
       // 'js/jquery.nicescroll.min.js',
       // 'js/slider.js',
        // '//www.google.com/recaptcha/api.js',
       // 'js/script.js',
       // 'js/animation.js',
        //'js/plugins/datatables/jquery.dataTables.min.js',
        //'js/plugins/datatables/extensions/dataTables.fixedColumns.min.js',
        //'js/eakroko.min.js',
        //'js/jquery.mousewheel.pack.js',
        //'js/jquery.fancybox.js',
        //'js/jquery.fancybox.pack.js',
        //'js/jquery.fancybox-buttons.js',
        //'js/jquery.fancybox-thumbs.js',
        //'js/jquery.fancybox-media.js',
        //'js/jqueryvalidation.js'
        // '//cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js'
    ];
    public $publishOptions = [
        'only' => [
            'css/*',
            'js/*',
            'fonts/*',
            'images/*',
        ],
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapPluginAsset'
    ];
}
