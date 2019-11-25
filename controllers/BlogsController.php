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
use app\models\UserBlogsModel;
use yii\web\NotFoundHttpException;

/**
 * Class BlogsController
 * @package app\controllers
 */
class BlogsController extends Controller
{
    public function actionIndex($url)
    {
        return $this->render('index');
    }
}