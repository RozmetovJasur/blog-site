<?php

use yii\db\Migration;

/**
 * Class m191118_155257_tr_suggestions
 */
class m191118_155257_tr_user_suggestions extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tr_user_suggestions', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'title' => $this->string(100),
            'content' => $this->text(),
            'created_at'=>$this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at'=>$this->timestamp()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191118_155257_tr_user_suggestions cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191118_155257_tr_suggestions cannot be reverted.\n";

        return false;
    }
    */
}
