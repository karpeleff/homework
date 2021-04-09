<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%motion}}`.
 */
class m210125_060423_create_motion_table extends Migration
{
    /**
     * {@inheritdoc}
     */
      public function safeUp()
    {
 $this->createTable('{{%motion}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'move' => $this->string(),
            'count'=> $this->integer(),
            'time' => $this->dateTime()
                           ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable();
    }
}
