<?php

use yii\db\Migration;

/**
 * Class m191116_115917_true_users
 */
class m191116_115917_tr_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tr_users', [
            'id' => $this->primaryKey(),
            'fname' => $this->string(50),
            'lname' => $this->string(50),
            'email' => $this->string(50)->notNull()->unique(),
            'password' => $this->string(300)->notNull(),
            'active' => $this->smallInteger(1)->defaultValue(0),
            'created_at'=>$this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at'=>$this->timestamp()->null()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191116_115917_tr_users cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191116_115917_tr_users cannot be reverted.\n";

        return false;
    }
    */
}
