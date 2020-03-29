<?php

use yii\db\Migration;

/**
 * Class m191116_123427_true_blogs
 */
class m191116_123427_tr_user_blogs extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tr_user_blogs', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'name' => $this->string(100),
            'info' => $this->text(),
            'keywords' => $this->text(),
            'description' => $this->text(),
            'slug' => $this->string(100),
            'count_article' => $this->integer()->defaultValue(0),
            'created_at'=>$this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at'=>$this->timestamp()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191116_123427_tr_user_blogs cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191116_123427_tr_blogs cannot be reverted.\n";

        return false;
    }
    */
}
