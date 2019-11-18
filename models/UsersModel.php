<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 18.11.2019
 * Time: 21:34
 */

namespace app\models;


use app\components\ActiveRecord;

/**
* Class UsersModel
* @package app\models
* @property $fname
* @property $lname
* @property $email
* @property $password
* @property $created_at
* @property $updated_at
*/
class UsersModel extends ActiveRecord
{
    public static function tableName()
    {
        return 'tr_users';
    }

}