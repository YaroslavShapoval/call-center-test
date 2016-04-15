<?php

use yii\db\Migration;

class m160415_104746_create_goods extends Migration
{
    private $tableName = '{{%goods}}';

    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable($this->tableName, [
            'good_id' => $this->primaryKey(),
            'good_name' => $this->string()->notNull()->unique(),
            'good_price' => $this->integer()->notNull(),
            'good_advert' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey(
            'fk_goods_advert_id',
            $this->tableName,
            'good_advert',
            '{{adverts}}',
            'user_id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }
}
