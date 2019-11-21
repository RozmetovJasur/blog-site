<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 21.11.2019
 * Time: 20:33
 */

namespace app\models;


use app\components\ActiveRecord;

/**
* Class UserArticleTagsModel
* @package app\models
* @property $user_id
* @property $article_id
* @property $tag_id
* @property $created_at
* @property $updated_at
*/
class UserArticleTagsModel extends ActiveRecord
{
    public static function tableName()
    {
        return 'tr_user_article_tags';
    }
}