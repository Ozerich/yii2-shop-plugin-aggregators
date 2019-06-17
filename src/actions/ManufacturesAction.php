<?php

namespace ozerich\shop\plugins\onliner\actions;

use ozerich\shop\plugins\onliner\sdk\models\Manufacture;
use yii\web\Response;

class ManufacturesAction extends BaseAction
{
    public function runWithParams($params)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        if (!isset($params['section'])) {
            return [];
        }

        $items = $this->onliner()->manufactures($params['section']);

        return array_map(function (Manufacture $manufacture) {
            return $manufacture->toJSON();
        }, $items);
    }
}
