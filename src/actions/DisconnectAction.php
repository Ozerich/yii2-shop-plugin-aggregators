<?php

namespace ozerich\shop\plugins\onliner\actions;

use ozerich\shop\plugins\onliner\models\ProductOnlinerby;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class DisconnectAction extends BaseAction
{
    public function runWithParams($params)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        $id = \Yii::$app->request->post('id');

        $product = ProductOnlinerby::find()->andWhere('onliner_product_id=:id', [':id' => $id])->one();
        if (!$product) {
            throw new NotFoundHttpException();
        }

        $this->service()->disconnect($product);

        return [];
    }
}
