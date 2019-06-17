<?php

namespace ozerich\shop\plugins\onliner\actions;

use ozerich\shop\models\Product;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class ConnectAction extends BaseAction
{
    public function runWithParams($params)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        $onliner_id = \Yii::$app->request->post('section_id');
        $manufacture_id = \Yii::$app->request->post('manufacture_id');
        $product_id = \Yii::$app->request->post('product_id');
        $model_id = \Yii::$app->request->post('model_id');

        $product = Product::findOne($model_id);
        if (!$product) {
            throw new NotFoundHttpException();
        }

        $model = $this->service()->connect($product, $onliner_id, $manufacture_id, $product_id);

        return [
            'id' => $model->id
        ];
    }
}
