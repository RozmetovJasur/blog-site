<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\jui\JuiAsset;
use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/template/vendors/linericon/style.css',
        '/template/css/font-awesome.min.css',
        '/template/vendors/owl-carousel/owl.carousel.min.css',
        '/template/vendors/lightbox/simpleLightbox.css',
//        '/template/vendors/nice-select/css/nice-select.css',
        '/template/vendors/animate-css/animate.css',
        '/template/css/style.css',
        '/template/css/responsive.css',
    ];
    public $js = [
        '/template/js/popper.js',
        '/template/js/stellar.js',
        '/template/vendors/lightbox/simpleLightbox.min.js',
//        '/template/vendors/nice-select/js/jquery.nice-select.min.js',
        '/template/vendors/isotope/imagesloaded.pkgd.min.js',
        '/template/vendors/isotope/isotope-min.js',
        '/template/vendors/owl-carousel/owl.carousel.min.js',
        '/template/js/jquery.ajaxchimp.min.js',
        '/template/js/mail-script.js',
        '/template/js/theme.js',
    ];
    public $depends = [
        BootstrapAsset::class,
        JuiAsset::class,
    ];
}
