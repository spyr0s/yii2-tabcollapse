<?php

namespace spyr0s\tabcollapse;

use yii\web\AssetBundle;

class TabCollapseAsset extends AssetBundle
{
    public $sourcePath = '@vendor/spyr0s/yii2-tabcollapse/assets/';

    public $js = [
        'bootstrap-tabcollapse.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
