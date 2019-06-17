<?php

namespace ozerich\shop\plugins\aggregators\actions;

use ozerich\shop\plugins\aggregators\constants\SettingOption;
use ozerich\shop\plugins\aggregators\sdk\onliner\models\Section;
use ozerich\shop\plugins\aggregators\sdk\onliner\Onliner;
use ozerich\shop\traits\ServicesTrait;
use yii\base\Action;
use yii\web\Response;

class SectionsAction extends Action
{
    use ServicesTrait;

    public function runWithParams($params)
    {
        $onliner = new Onliner(
            $this->settingsService()->get(SettingOption::ONLINER_CLIENT_ID),
            $this->settingsService()->get(SettingOption::ONLINER_CLIENT_SECRET)
        );

        $items = $onliner->sections();

        \Yii::$app->response->format = Response::FORMAT_JSON;

        return array_map(function (Section $section) {
            return $section->toJSON();
        }, $items);
    }
}
