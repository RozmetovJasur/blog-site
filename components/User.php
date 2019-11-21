<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 21.11.2019
 * Time: 18:54
 */

namespace app\components;

use app\models\UsersModel;

/**
 * Class User
 * @package app\components
 */
class User extends \yii\web\User
{
    public $_user;

    /**
     * @throws \yii\base\InvalidConfigException
     */
    public function init()
    {
        if (!$this->isGuest) {
            /** @var UsersModel $user */
            $this->_user = $this->identity;
        }
        else
            $this->logout();

        parent::init();
    }

    public function getUser()
    {
        return $this->_user;
    }
}