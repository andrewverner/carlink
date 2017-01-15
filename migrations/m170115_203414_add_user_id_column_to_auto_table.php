<?php

use yii\db\Migration;

/**
 * Handles adding user_id to table `auto`.
 */
class m170115_203414_add_user_id_column_to_auto_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('auto', 'user_id', $this->integer()->notNull());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
