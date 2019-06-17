<?php

namespace ozerich\shop\plugins\aggregators\actions;

use yii\base\Action;
use yii\web\Response;

class TestAction extends Action
{
    public function runWithParams($params)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        return [
            'succes2s' => true
        ];
    }
}
