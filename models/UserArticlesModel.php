<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 21.11.2019
 * Time: 20:32
 */

namespace app\models;


use app\components\ActiveRecord;

/**
* Class UserArticlesModel
* @package app\models
* @property $user_id
* @property $blog_id
* @property $title
* @property $content
* @property $image
* @property $slug
* @property $count_vote_up
* @property $count_vote_down
* @property $count_read
* @property $count_comment
* @property $status
* @property $created_at
* @property $updated_at
*/
class UserArticlesModel extends ActiveRecord
{
    public static function tableName()
    {
        return 'tr_user_articles';
    }
}