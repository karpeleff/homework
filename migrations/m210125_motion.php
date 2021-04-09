<?php

use yii\db\Migration;

/**
 * Class m210125_052936_motion
 */
class m210125_motion extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
 $this->createTable('motion', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'move' => $this->string(),
            'count'=> $this->integer(),
            'time' => $this->dateTime()
                           ]);
    }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210125_052936_motion cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210125_052936_motion cannot be reverted.\n";

        return false;
    }
    */
}
