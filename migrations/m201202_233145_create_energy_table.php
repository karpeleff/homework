<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%energy}}`.
 */
class m201202_233145_create_energy_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%energy}}', [
            'id' => $this->primaryKey(),
            'counter' => $this->string()->notNull(),
            'date' => $this->string()->notNull()

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%energy}}');
    }
}
