<?php

namespace ozerich\shop\plugins\onliner\actions;

use ozerich\shop\plugins\onliner\sdk\models\Product;
use yii\web\Response;

class ProductsAction extends BaseAction
{
    public function runWithParams($params)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        if (!isset($params['section']) || !isset($params['manufacture'])) {
            return [];
        }

        $items = $this->onliner()->products($params['section'], $params['manufacture']);

        return array_map(function (Product $product) {
            return $product->toJSON();
        }, $items);
    }
}
