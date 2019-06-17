<?php

namespace ozerich\shop\plugins\onliner\react;

use yii\web\AssetBundle;

class ListAppAsset extends AssetBundle
{
    public $sourcePath = '@vendor/ozerich/yii2-shop-plugin-onlinerby/src/react/list-app/build';

    public $js = [
        'build.js',
    ];

    public $css = [
        'build.css',
    ];
}