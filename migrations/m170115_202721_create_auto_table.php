<?php

use yii\db\Migration;

/**
 * Handles the creation of table `auto`.
 */
class m170115_202721_create_auto_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('auto', [
            'id' => $this->primaryKey(),
            'brand' => $this->char(45)->notNull(),
            'model' => $this->char(45)->notNull(),
            'modification' => $this->char(45)->notNull(),
            'year' => $this->integer(4)->notNull(),
            'mileage' => $this->integer(6)->notNull(),
            'image' => $this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('auto');
    }
}
