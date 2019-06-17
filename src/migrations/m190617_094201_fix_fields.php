<?php

namespace ozerich\shop\plugins\aggregators\migrations;

use yii\db\Migration;

/**
 * Class m190617_094201_fix_fields
 */
class m190617_094201_fix_fields extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%product_onlinerby}}', 'onliner_section_id', $this->integer());
        $this->addColumn('{{%product_onlinerby}}', 'onliner_manufacture_id', $this->integer());
        $this->addColumn('{{%product_onlinerby}}', 'onliner_product_id', $this->integer());

        $this->dropColumn('{{%product_onlinerby}}', 'onliner_offer_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%product_onlinerby}}', 'onliner_offer_id', $this->bigInteger());

        $this->dropColumn('{{%product_onlinerby}}', 'onliner_product_id');
        $this->dropColumn('{{%product_onlinerby}}', 'onliner_manufacture_id');
        $this->dropColumn('{{%product_onlinerby}}', 'onliner_section_id');
    }
}
