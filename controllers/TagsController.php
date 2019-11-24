<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 24.11.2019
 * Time: 20:48
 */

namespace app\controllers;


use app\components\Controller;

/**
 * Class TagsController
 * @package app\controllers
 */
class TagsController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}