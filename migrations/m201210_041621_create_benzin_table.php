<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%benzin}}`.
 */
class m201210_041621_create_benzin_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%benzin}}', [
            'id' => $this->primaryKey(),
            'prixod' => $this->string()->notNull(),
            'rasxod' => $this->string()->notNull(),
            'ostatok' => $this->string()->notNull(),
            'creation' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%benzin}}');
    }
}
