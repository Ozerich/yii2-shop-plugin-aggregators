<?php

namespace ozerich\shop\plugins\onliner\actions;

use ozerich\shop\plugins\onliner\services\OnlinerService;
use ozerich\shop\traits\ServicesTrait;
use yii\base\Action;
use yii\web\Response;

class BaseAction extends Action
{
    use ServicesTrait;

    public function beforeRun()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        return parent::beforeRun();
    }

    /**
     * @return \ozerich\shop\plugins\onliner\sdk\Onliner
     */
    protected function onliner()
    {
        return (new OnlinerService())->onliner();
    }
}
