<?php

use yii\db\Migration;

class m160415_085321_states_table extends Migration
{
    private $tableName = '{{states}}';

    public function up()
    {
        $this->createTable($this->tableName, [
            'state_id' => $this->primaryKey(),
            'state_name' => $this->string()->notNull(),
            'state_slug' => $this->string()->notNull(),
        ]);

        $this->insert($this->tableName, [
            'state_name' => 'Новый',
            'state_slug' => 'new',
        ]);

        $this->insert($this->tableName, [
            'state_name' => 'В работе',
            'state_slug' => 'onoperator',
        ]);

        $this->insert($this->tableName, [
            'state_name' => 'Подтверждён',
            'state_slug' => 'accepted',
        ]);
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }
}
