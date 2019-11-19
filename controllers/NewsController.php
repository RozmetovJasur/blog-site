<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 19.11.2019
 * Time: 20:10
 */

namespace app\controllers;


use app\components\Controller;

/**
 * Class NewsController
 * @package app\controllers
 */
class NewsController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}