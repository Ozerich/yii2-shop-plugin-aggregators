<?php

namespace ozerich\shop\plugins\onliner\actions;

use ozerich\shop\plugins\onliner\sdk\models\Section;
use yii\web\Response;

class SectionsAction extends BaseAction
{
    public function runWithParams($params)
    {
        $items = $this->onliner()->sections();

        \Yii::$app->response->format = Response::FORMAT_JSON;

        return array_map(function (Section $section) {
            return $section->toJSON();
        }, $items);
    }
}
