<?php

use yii\db\Migration;

/**
 * Class m210125_052832_tmc
 */
class m210125_052832_tmc extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
 $this->createTable('tmc', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'balance' => $this->integer(),
            'motion_id'=> $this->integer(),
            'time' => $this->dateTime()
                           ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210125_052832_tmc cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210125_052832_tmc cannot be reverted.\n";

        return false;
    }
    */
}
