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
* Class UserTagsModel
* @package app\models
* @property $user_id
* @property $name
* @property $slug
* @property $created_at
* @property $updated_at
*/
class UserTagsModel extends ActiveRecord
{
    public static function tableName()
    {
        return 'tr_user_tags';
    }
}