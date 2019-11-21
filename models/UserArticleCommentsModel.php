<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 21.11.2019
 * Time: 20:34
 */

namespace app\models;


use app\components\ActiveRecord;

/**
* Class UserArticleCommentsModel
* @package app\models
* @property $user_id
* @property $comment
* @property $created_at
* @property $updated_at
*/
class UserArticleCommentsModel extends ActiveRecord
{
    public static function tableName()
    {
        return 'tr_user_article_comments';
    }
}