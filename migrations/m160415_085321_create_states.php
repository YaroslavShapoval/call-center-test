<?php

use yii\db\Migration;

class m160415_085321_create_states extends Migration
{
    private $tableName = '{{states}}';

    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable($this->tableName, [
            'state_id' => $this->primaryKey(),
            'state_name' => $this->string()->notNull(),
            'state_slug' => $this->string()->notNull(),
        ], $tableOptions);

        $this->createIndex(
            'idx_state_slug',
            $this->tableName,
            'state_slug'
        );

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
