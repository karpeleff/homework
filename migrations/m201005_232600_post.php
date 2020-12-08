<?php

use yii\db\Migration;

/**
 * Class m201005_232600_post
 */
class m201005_232600_post extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

$this->createTable('post', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'content' => $this->text(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201005_232600_post cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201005_232600_post cannot be reverted.\n";

        return false;
    }
    */
}
