<?php

namespace ozerich\shop\plugins\onliner;

use ozerich\shop\plugins\IPage;

class ListPage implements IPage
{
    public function pageTitle()
    {
        return 'Onliner.Каталог';
    }

    public function menuParent()
    {
        return null;
    }

    public function menuLabel()
    {
        return 'Onliner.Каталог';
    }

    public function render()
    {
        $view = \Yii::$app->controller->view;

        return $view->render('@vendor/ozerich/yii2-shop-plugin-onlinerby/src/views/list.php');
    }
}