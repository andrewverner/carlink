<?php

use yii\db\Migration;

/**
 * Handles the creation of table `image`.
 */
class m170115_203231_create_image_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('image', [
            'id' => $this->primaryKey(),
            'name' => $this->char(45)->notNull(),
            'path' => $this->char(45)->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('image');
    }
}
