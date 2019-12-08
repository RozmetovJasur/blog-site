<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 01.12.2019
 * Time: 19:03
 */

namespace app\models;


use app\components\ActiveRecord;

/**
* Class UserNewsCategoryModel
* @package app\models
* @property $user_id
* @property $name
* @property $slug
* @property $keywords
* @property $description
* @property $created_at
* @property $updated_at
*/
class UserNewsCategoryModel extends ActiveRecord
{
    public static function tableName()
    {
        return 'tr_user_news_category';
    }
}