<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m170113_113002_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->char(45)->notNull(),
            'password' => $this->char(32)->notNull(),
            'first_name' => $this->char(45),
            'last_name' => $this->char(45),
            'patronymic' => $this->char(45),
            'email' => $this->char(45)->notNull()
        ], 'charset=utf8');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}
