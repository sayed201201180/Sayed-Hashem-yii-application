<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AdminAsset extends AssetBundle
{
    public $baseUrl = '@web/themes/leaniumadmin-new';
    public $css = [

//'bootstrap/dist/css/bootstrap.min.css',
    'plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css',
    'css/animate.css', 
    'css/style.css?v=1.2',
    'css/colors/afkary.css?v=1.4.5',
   ];
    public $js = [
        //'bootstrap/dist/js/bootstrap.min.js',
        'plugins/bower_components/sidebar-nav/dist/sidebar-nav.js', 
        'js/jquery.slimscroll.js', 
        'js/custom.min.js',
     ]; 
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'backend\assets\AppAsset'
    ];
    
     public function init()
    {
        parent::init();
    } 
}