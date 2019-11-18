<?php

use yii\db\Migration;

/**
 * Class m191116_141253_tr_topic_tags
 */
class m191116_141253_tr_user_topic_tags extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tr_user_topic_tags', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'topic_id' => $this->integer(),
            'tag_id' => $this->integer(),
            'created_at'=>$this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at'=>$this->timestamp()
        ]);
        /**
        // add foreign key for table `tr_topic_tags`
        $this->addForeignKey(
            'fk-topic-topic_id',
            'tr_user_topic_tags',
            'topic_id',
            'tr_user_topics',
            'id',
            'CASCADE'
        );
        // add foreign key for table `tr_topic_tags`
        $this->addForeignKey(
            'fk-topic-tags-tag_id',
            'tr_user_topic_tags',
            'tag_id',
            'tr_user_tags',
            'id',
            'CASCADE'
        );
         * */
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191116_141253_tr_user_topic_tags cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191116_141253_tr_topic_tags cannot be reverted.\n";

        return false;
    }
    */
}
