<?php

namespace ozerich\shop\plugins\onliner\react;

use yii\web\AssetBundle;

class TabAppAsset extends AssetBundle
{
    public $sourcePath = '@vendor/ozerich/yii2-shop-plugin-onlinerby/src/react/tab-app/build';

    public $js = [
        'build.js',
    ];

    public $css = [
        'build.css',
    ];
}