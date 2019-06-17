<?php

namespace ozerich\shop\plugins\aggregators;

use ozerich\shop\models\Product;
use ozerich\shop\plugins\IProductTab;

class ProductTab implements IProductTab
{
    public function tabLabel()
    {
        return 'Агрегаторы';
    }

    public function isTabVisible(Product $product)
    {
        return true;
    }

    public function render(Product $product)
    {
        $view = \Yii::$app->controller->view;

        return $view->render('@vendor/ozerich/yii2-shop-plugin-aggregators/src/views/tab.php', ['model' => $product]);
    }
}