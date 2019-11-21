<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 19.11.2019
 * Time: 19:57
 */

namespace app\controllers;


use app\components\ActiveDataProvider;
use app\components\Controller;
use app\models\UserArticlesModel;
use app\models\UserBlogsModel;

/**
 * Class ArticlesController
 * @package app\controllers
 */
class ArticlesController extends Controller
{
    public function actionIndex($url = null)
    {
        $blog = UserBlogsModel::find()
            ->andFilterWhere(['slug' => $url])
            ->one();

        $query = UserArticlesModel::find();

        if($blog)
            $query->where(['blog_id' => $blog->id]);

        $data = new ActiveDataProvider([
            'query' => $query->orderBy(['id' => SORT_ASC]),
            'pagination' => [
                'pageSize' => 20,
            ]
        ]);

        return $this->render('index',[
            "data" => $data,
        ]);
    }
}