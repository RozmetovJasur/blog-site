<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 19.11.2019
 * Time: 19:57
 */

namespace app\controllers;


use app\components\Controller;

/**
 * Class ArticlesController
 * @package app\controllers
 */
class ArticlesController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}