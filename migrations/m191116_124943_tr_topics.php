<?php

use yii\db\Migration;

/**
 * Class m191116_124943_tr_topics
 */
class m191116_124943_tr_topics extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tr_topics', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'blog_id' => $this->integer(),
            'title' => $this->string(100),
            'content' => $this->text(),
            'image' => $this->string(200),
            'slug' => $this->string(100),
            'count_vote_up' => $this->integer()->defaultValue(0),
            'count_vote_down' => $this->integer()->defaultValue(0),
            'count_read' => $this->integer()->defaultValue(0),
            'count_comment' => $this->integer()->defaultValue(0),
            'status' => $this->smallInteger(1)->defaultValue(0),
            'created_at'=>$this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at'=>$this->timestamp()
        ]);

        // creates index for column `blog_id`
        $this->createIndex(
            'idx-topic-blog_id',
            'tr_topics',
            'blog_id'
        );

        // add foreign key for table `tr_blogs`
        $this->addForeignKey(
            'fk-topic-blog_id',
            'tr_topics',
            'blog_id',
            'tr_blogs',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191116_124943_tr_topics cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191116_124943_tr_topics cannot be reverted.\n";

        return false;
    }
    */
}
