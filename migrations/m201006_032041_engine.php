<?php

use yii\db\Migration;

/**
 * Class m201006_032041_engine
 */
class m201006_032041_engine extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
          $this->createTable('engine', [
            'id' => $this->primaryKey(),
            'start_time' => $this->string()->notNull(),
            'stop_time' => $this->string()->notNull(),
            'engine_type' => $this->string()->notNull(),
            'type_start' => $this->string()->notNull(),
            'work_time' => $this->string()->notNull(),
            
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201006_032041_engine cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201006_032041_engine cannot be reverted.\n";

        return false;
    }
    */
}
