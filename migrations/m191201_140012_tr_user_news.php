<?php

use yii\db\Migration;

/**
 * Class m191201_140012_tr_user_news
 */
class m191201_140012_tr_user_news extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tr_user_news', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'category_id' => $this->text(),
            'title' => $this->string(100),
            'content' => $this->text(),
            'image' => $this->string(200),
            'slug' => $this->string(100),
            'keywords' => $this->string(300),
            'description' => $this->string(500),
            'count_vote_up' => $this->integer()->defaultValue(0),
            'count_vote_down' => $this->integer()->defaultValue(0),
            'count_read' => $this->integer()->defaultValue(0),
            'count_comment' => $this->integer()->defaultValue(0),
            'status' => $this->smallInteger(1)->defaultValue(0),
            'created_at'=>$this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at'=>$this->timestamp()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191201_140012_tr_user_news cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191201_140012_tr_user_news cannot be reverted.\n";

        return false;
    }
    */
}
