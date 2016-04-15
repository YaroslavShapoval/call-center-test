<?php

use yii\db\Migration;

class m160415_111947_fill_test_users_data extends Migration
{
    private $tableName = '{{adverts}}';

    public function up()
    {
        $this->insert($this->tableName, [
            'user_first_name' => 'John',
            'user_last_name' => 'Doe',
            'user_login' => 'john_doe@example.com',
            'user_password' => 'password',
        ]);

        $this->insert($this->tableName, [
            'user_first_name' => 'Erick',
            'user_last_name' => 'Doe',
            'user_login' => 'erick_doe@example.com',
            'user_password' => 'password',
        ]);

        $this->insert($this->tableName, [
            'user_first_name' => 'Michael',
            'user_last_name' => 'Doe',
            'user_login' => 'michael_doe@example.com',
            'user_password' => 'password',
        ]);
    }

    public function down()
    {
        $this->truncateTable($this->tableName);
    }
}
