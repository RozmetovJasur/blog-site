<?php

use yii\db\Migration;

/**
 * Class m191119_141104_tr_user_article_comments
 */
class m191119_141104_tr_user_article_comments extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tr_user_article_comments', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'article_id' => $this->integer(),
            'comment' => $this->text(),
            'created_at'=>$this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at'=>$this->timestamp()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191119_141104_tr_user_article_comments cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191119_141104_tr_user_article_comments cannot be reverted.\n";

        return false;
    }
    */
}
