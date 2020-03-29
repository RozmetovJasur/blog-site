<?php

use yii\db\Migration;

/**
 * Class m191201_140002_tr_user_news_category
 */
class m191201_140002_tr_user_news_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tr_user_news_category', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'name' => $this->string(50),
            'slug' => $this->string(50),
            'keywords' => $this->text(),
            'description' => $this->text(),
            'created_at'=>$this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at'=>$this->timestamp()->null()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191201_140002_tr_user_news_category cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191201_140002_tr_user_news_category cannot be reverted.\n";

        return false;
    }
    */
}
