<?php

namespace ozerich\shop\plugins\onliner\actions;

use ozerich\shop\plugins\onliner\models\ProductOnlinerby;
use yii\web\Response;

class ConnectionsAction extends BaseAction
{
    public function runWithParams($params)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        $section_id = \Yii::$app->request->get('section_id');
        $manufacture_id = \Yii::$app->request->get('manufacture_id');

        $products = $this->service()->getConnections($section_id, $manufacture_id);

        return array_map(function (ProductOnlinerby $model) {
            return $this->service()->toConnectionJSON($model);
        }, $products);
    }
}
