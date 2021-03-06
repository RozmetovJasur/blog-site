<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 21.11.2019
 * Time: 20:31
 */

namespace app\models;


use app\components\ActiveRecord;

/**
* Class UserBlogsModel
* @package app\models
* @property $user_id
* @property $name
* @property $info
* @property $keywords
* @property $description
* @property $slug
* @property $count_article
* @property $created_at
* @property $updated_at
* @property \app\models\UsersModel $user
*/
class UserBlogsModel extends ActiveRecord
{
    public static function tableName()
    {
        return 'tr_user_blogs';
    }

    public function getUser()
    {
        return $this->hasOne(UsersModel::class,['id' => 'user_id']);
    }
}