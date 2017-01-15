<?php

use yii\db\Migration;

class m170115_213557_alter_char_columns extends Migration
{
    public function up()
    {
        $this->alterColumn('user', 'username', $this->string(45)->notNull());
        $this->alterColumn('user', 'password', $this->string(32)->notNull());
        $this->alterColumn('user', 'email', $this->string(45)->notNull());
        $this->alterColumn('user', 'last_name', $this->string(45));
        $this->alterColumn('user', 'first_name', $this->string(45));
        $this->alterColumn('user', 'patronymic', $this->string(45));

        $this->alterColumn('auto', 'brand', $this->string(45)->notNull());
        $this->alterColumn('auto', 'model', $this->string(45)->notNull());
        $this->alterColumn('auto', 'modification', $this->string(45)->notNull());

        $this->alterColumn('image', 'name', $this->string()->notNull());
        $this->alterColumn('image', 'path', $this->string()->notNull());
    }

    public function down()
    {
        echo "m170115_213557_alter_char_columns cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
