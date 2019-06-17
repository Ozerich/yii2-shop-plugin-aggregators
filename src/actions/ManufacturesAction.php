<?php

namespace ozerich\shop\plugins\onliner\actions;

use ozerich\shop\plugins\onliner\sdk\models\Manufacture;

class ManufacturesAction extends BaseAction
{
    public function runWithParams($params)
    {
        if (!isset($params['section'])) {
            return [];
        }

        $items = $this->onliner()->manufactures($params['section']);

        return array_map(function (Manufacture $manufacture) {
            return $manufacture->toJSON();
        }, $items);
    }
}
