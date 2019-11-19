<?php

use yii\db\Migration;

/**
 * Class m191116_141253_tr_article_tags
 */
class m191116_141253_tr_user_article_tags extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tr_user_article_tags', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'article_id' => $this->integer(),
            'tag_id' => $this->integer(),
            'created_at'=>$this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at'=>$this->timestamp()
        ]);
        /**
        // add foreign key for table `tr_article_tags`
        $this->addForeignKey(
            'fk-article-article_id',
            'tr_user_article_tags',
            'article_id',
            'tr_user_articles',
            'id',
            'CASCADE'
        );
        // add foreign key for table `tr_article_tags`
        $this->addForeignKey(
            'fk-article-tags-tag_id',
            'tr_user_article_tags',
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
        echo "m191116_141253_tr_user_article_tags cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191116_141253_tr_article_tags cannot be reverted.\n";

        return false;
    }
    */
}
