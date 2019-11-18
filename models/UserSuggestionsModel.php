<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 18.11.2019
 * Time: 21:06
 */

namespace app\models;


use app\components\ActiveRecord;

/**
* Class UserSuggestionsModel
* @package app\models
* @property $user_id
* @property $title
* @property $content
* @property $created_at
* @property $updated_at
*/
class UserSuggestionsModel extends ActiveRecord
{
    public $fname,$email,$verifyCode;
    const SCENARIO_ADD = 'add';

    public static function tableName()
    {
        return 'tr_user_suggestions';
    }

    public function attributeLabels()
    {
        return [
            'fname' => t("Ism"),
            'email' => t("Email"),
            'title' => t("Savol mavzusi"),
            'content' => t("Savol matni"),
            'verifyCode' => t("Tasdiqlash kodi"),
        ];
    }

    public function scenarios()
    {
        return [
            self::SCENARIO_ADD => ['user_id', 'fname', 'email', 'title', 'content', 'verifyCode'],
        ];
    }

    public function rules()
    {
        return [
            [['fname', 'email', 'title', 'content'], 'required',
                'on' => [self::SCENARIO_ADD]],
            [['fname', 'title'], 'string', 'length' => [2, 50],
                'on' => [self::SCENARIO_ADD]],
            [['email'], 'email',
                'on' => [self::SCENARIO_ADD]],
            [['content'], 'string', 'length' => [2, 500],
                'on' => [self::SCENARIO_ADD]],
//            ['verifyCode', 'captcha', 'captchaAction'=> '/site/captcha',
//                'on' => [self::SCENARIO_ADD]],
        ];
    }
}