<?php

namespace ozerich\shop\plugins\aggregators\migrations;

use yii\db\Migration;

/**
 * Class m190617_094200_plugin_test
 */
class m190617_094200_plugin_test extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_onlinerby}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'onliner_offer_id' => $this->bigInteger()->notNull(),
            'price_id' => $this->integer()
        ]);

        $this->addForeignKey('product_onlinerby_product', '{{%product_onlinerby}}', 'product_id', '{{%products}}', 'id', 'CASCADE');
        $this->addForeignKey('product_onlinerby_price', '{{%product_onlinerby}}', 'price_id', '{{%product_prices}}', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('product_onlinerby_price', '{{%product_onlinerby}}');
        $this->dropForeignKey('product_onlinerby_product', '{{%product_onlinerby}}');

        $this->dropTable('{{%product_onlinerby}}');
    }
}
