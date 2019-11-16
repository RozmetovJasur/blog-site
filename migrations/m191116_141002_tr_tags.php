<?php

use yii\db\Migration;

/**
 * Class m191116_141002_tr_tags
 */
class m191116_141002_tr_tags extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tr_tags', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'name' => $this->string(20),
            'slug' => $this->string(20),
            'created_at'=>$this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at'=>$this->timestamp()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191116_141002_tr_tags cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191116_141002_tr_tags cannot be reverted.\n";

        return false;
    }
    */
}
