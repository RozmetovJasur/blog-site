<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 21.11.2019
 * Time: 21:42
 */

namespace app\controllers;



use app\components\AuthController;

/**
 * Class CabinetController
 * @package app\controllers
 */
class CabinetController extends AuthController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}