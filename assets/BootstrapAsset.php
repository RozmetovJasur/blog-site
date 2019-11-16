<?php
namespace app\assets;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

/**
 * Bootstrap css va js fayllari uchun
 */
class BootstrapAsset extends AssetBundle
{
    public $sourcePath = '@app/assets/bootstrap';
    public $css = [
        'css/bootstrap.css',
    ];
    public $js = [
        "js/bootstrap.min.js",
    ];

    public $depends = [
        'yii\jui\JuiAsset',
        JqueryAsset::class,
    ];
}
