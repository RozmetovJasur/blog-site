<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 19.11.2019
 * Time: 19:53
 */

namespace app\controllers;


use app\components\Controller;

/**
 * Class BlogsController
 * @package app\controllers
 */
class BlogsController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}