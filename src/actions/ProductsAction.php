<?php

namespace ozerich\shop\plugins\onliner\actions;

use ozerich\shop\plugins\onliner\sdk\models\Section;

class ProductsAction extends BaseAction
{
    public function runWithParams($params)
    {
        $items = $this->onliner()->sections();

        return array_map(function (Section $section) {
            return $section->toJSON();
        }, $items);
    }
}
