<?php

use yii\db\Migration;

class m160415_103553_create_adverts extends Migration
{
    private $tableName = '{{%adverts}}';

    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable($this->tableName, [
            'user_id' => $this->primaryKey(),
            'user_first_name' => $this->string()->notNull(),
            'user_last_name' => $this->string()->notNull(),
            'user_login' => $this->string()->unique()->notNull(),
            'user_password' => $this->string()->notNull(),
        ], $tableOptions);

        $this->createIndex(
            'idx_adverts_user_login',
            $this->tableName,
            'user_login'
        );
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }
}
