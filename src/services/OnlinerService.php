<?php

namespace ozerich\shop\plugins\onliner\services;

use ozerich\shop\models\Product;
use ozerich\shop\modules\api\models\ProductShortDTO;
use ozerich\shop\plugins\onliner\constants\SettingOption;
use ozerich\shop\plugins\onliner\models\ProductOnlinerby;
use ozerich\shop\plugins\onliner\sdk\Onliner;
use ozerich\shop\traits\ServicesTrait;

class OnlinerService
{
    use ServicesTrait;

    private $onliner = null;

    /**
     * @return Onliner
     */
    public function onliner()
    {
        if ($this->onliner == null) {
            $this->onliner = new Onliner(
                $this->settingsService()->get(SettingOption::ONLINER_CLIENT_ID),
                $this->settingsService()->get(SettingOption::ONLINER_CLIENT_SECRET)
            );
        }

        return $this->onliner;
    }

    public function connect(Product $product, $onlinerSectionId, $onlinerManufactureId, $onlinerProductId)
    {
        $exists = ProductOnlinerby::find()
            ->andWhere('onliner_section_id=:section_id', [':section_id' => $onlinerSectionId])
            ->andWhere('onliner_manufacture_id=:manufacture_id', [':manufacture_id' => $onlinerManufactureId])
            ->andWhere('onliner_product_id=:product_id', [':product_id' => $onlinerProductId])
            ->one();

        if ($exists) {
            $exists->delete();
        }

        $model = new ProductOnlinerby();
        $model->product_id = $product->id;
        $model->onliner_section_id = $onlinerSectionId;
        $model->onliner_manufacture_id = $onlinerManufactureId;
        $model->onliner_product_id = $onlinerProductId;
        $model->save();

        return $model;
    }

    /**
     * @param $onlinerSectionId
     * @param $onlinerManufactureId
     * @return ProductOnlinerby[]
     */
    public function getConnections($onlinerSectionId, $onlinerManufactureId)
    {
        return ProductOnlinerby::find()
            ->andWhere('onliner_section_id=:section_id', [':section_id' => $onlinerSectionId])
            ->andWhere('onliner_manufacture_id=:manufacture_id', [':manufacture_id' => $onlinerManufactureId])
            ->all();
    }

    public function toConnectionJSON(ProductOnlinerby $item)
    {
        return [
            'onliner_id' => $item->onliner_product_id,
            'model' => (new ProductShortDTO($item->product))->toJSON()
        ];
    }

    public function disconnect(ProductOnlinerby $item)
    {
        $item->delete();
    }
}