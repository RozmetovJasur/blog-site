<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 18.11.2019
 * Time: 21:34
 */

namespace app\models;

use Yii;
use app\components\ActiveRecord;
use app\traits\IdentityTrait;
use yii\web\IdentityInterface;

/**
* Class UsersModel
* @package app\models
* @property $fname
* @property $lname
* @property $email
* @property $password
* @property $active
* @property $created_at
* @property $updated_at
* @property $authKey
*/
class UsersModel extends ActiveRecord implements IdentityInterface
{
    use IdentityTrait;
    public $_user = null, $confirm;

    const SCENARIO_LOGIN = "login";
    const SCENARIO_REGISTRATION = "registration";

    public static function tableName()
    {
        return 'tr_users';
    }

    public function attributeLabels()
    {
        return [
            'username' => t("Email"),
            'password' => t("Parol"),
            "fname" => t("Ismingiz"),
            "lname" => t("Familiyangiz"),
            "sname" => t("Otangizning ismi"),
            "gender" => t("Jinsingiz"),
            "phone" => t("Telefon nomer"),
            "address" => t("Manzil"),
            "birthday" => t("Tug`ilgan kuningiz")
        ];
    }

    /**
     * @return array
     */
    public function scenarios()
    {
        return [
            self::SCENARIO_LOGIN => ["email", "password"],
            self::SCENARIO_REGISTRATION => ["fname", "email", "password", 'confirm'],
        ];
    }
    /**
     * @return array
     */
    public function rules()
    {
        return [
            //userni ro'yxatdan o'tkazish
            [["email", "fname", "password", "confirm"], "required",
                "on" => [self::SCENARIO_REGISTRATION]],
            [["fname"], "string", "min" => 3, "max" => 50,
                "on" => [self::SCENARIO_REGISTRATION]],
            [["email"], "email",
                "on" => [self::SCENARIO_REGISTRATION]],
            [["email"], "unique",
                "on" => [self::SCENARIO_REGISTRATION]],
            [['confirm'],'compare','compareAttribute'=>'password',
                "on" => [self::SCENARIO_REGISTRATION]],
            [['password'],'string','length'=> [6,6],
                "on" => [self::SCENARIO_REGISTRATION]],

            //user ni login qilish
            [["email", "password"], "required",
                "on" => [self::SCENARIO_LOGIN]],
            [["password"], "validateAuth",
                "on" => [self::SCENARIO_LOGIN]],
        ];
    }


    public function validateAuth($attribute, $params) {
        if ($this->hasErrors("email") || $this->hasErrors($attribute)) {
            return;
        }

        if ($this->_user === null) {
            $this->_user = self::find()->where(["email" => $this->email])->one();
        }

        if (!$this->_user) {
            $this->addError($attribute, t("Email yoki parol noto`g`ri kiritilgan."));
            return;
        }

        if (!Yii::$app->security->validatePassword($this->password, $this->_user->password)) {
            $this->addError($attribute, t("Email yoki parol noto`g`ri kiritilgan."));
            return;
        }
    }

    public function login($user = null) {
        if ($user !== null) {
            $this->_user = $user;
        }

        if ($this->_user === null) {
            $this->_user = self::find()->where(["email" => $this->email])->one();
        }

        $return = Yii::$app->user->login($this->_user);
        if ($return && !isset($user)) {
            $this->_user->save(false);
        }

        return $return;
    }
}