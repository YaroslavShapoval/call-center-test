<?php

use yii\db\Migration;

class m160415_105321_create_orders extends Migration
{
    private $tableName = '{{orders}}';

    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable($this->tableName, [
            'order_id' => $this->primaryKey(),
            'order_state' => $this->integer()->notNull(),
            'order_add_time' => $this->dateTime()->notNull(),
            'order_good' => $this->integer()->notNull(),
            'order_client_phone' => $this->string()->notNull(),
            'order_client_name' => $this->string()->notNull(),
        ], $tableOptions);

        $this->addForeignKey(
            'fk_order_state_id',
            $this->tableName,
            'order_state',
            '{{states}}',
            'state_id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_order_good_id',
            $this->tableName,
            'order_good',
            '{{goods}}',
            'good_id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }
}
