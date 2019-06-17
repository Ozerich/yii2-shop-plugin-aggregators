<?php

namespace ozerich\shop\plugins\onliner\models;

use ozerich\shop\models\ProductPrice;
use ozerich\shop\plugins\onliner\sdk\models\Product;

/**
 * This is the model class for table "product_onlinerby".
 *
 * @property int $id
 * @property int $product_id
 * @property int $price_id
 * @property int $onliner_section_id
 * @property int $onliner_manufacture_id
 * @property int $onliner_product_id
 *
 * @property ProductPrice $price
 * @property \ozerich\shop\models\Product $product
 */
class ProductOnlinerby extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%product_onlinerby}}';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrice()
    {
        return $this->hasOne(ProductPrice::className(), ['id' => 'price_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(\ozerich\shop\models\Product::className(), ['id' => 'product_id']);
    }
}
