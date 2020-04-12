<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 19.11.2019
 * Time: 19:57
 */

namespace app\controllers;

use app\helpers\SeoHelpers;
use Yii;
use app\components\ActiveDataProvider;
use app\components\Controller;
use app\models\UserArticlesModel;
use app\models\UserBlogsModel;
use app\models\UserTagsModel;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

/**
 * Class ArticlesController
 * @package app\controllers
 */
class ArticlesController extends Controller
{
//    public function behaviors()
//    {
//        return [
//            [
//                'class' => 'yii\filters\PageCache',
//                'only' => ['index','view'],
//                'duration' => 3600,
//            ],
//        ];
//    }

    public function actionIndex($url = null)
    {
        /** @var UserBlogsModel $blog */
        $blog = UserBlogsModel::find()
            ->where(['slug' => $url])
            ->one();
        $query = UserArticlesModel::find();
        if($blog) {
            $query->where(['like', 'blog_id', $blog->id]);
            $this->registerMetaTag($blog->keywords, $blog->description);
        }
        else
            $this->registerMetaTag();

        $data = new ActiveDataProvider([
            'query' => $query->orderBy(['id' => SORT_ASC]),
            'pagination' => [
                'pageSize' => 20,
            ]
        ]);

        $blogs = ArrayHelper::map(UserBlogsModel::find()->all(),'id',function ($row){
            return ['name' => $row->name, 'slug' => $row->slug];
        });
        $tags = ArrayHelper::map(UserTagsModel::find()->all(),'id',function ($row){
            return ['name' => $row->name, 'slug' => $row->slug];
        });

        return $this->render('index',[
            "data" => $data,
            "blogs" => $blogs,
            "tags" => $tags,
        ]);
    }

    public function actionView($url)
    {
        /** @var UserArticlesModel $model */
        $model = UserArticlesModel::find()
            ->andFilterWhere(['slug' => $url])
            ->one();
        if(!$model)
            throw new NotFoundHttpException();

        //seo ni yoqish
        $this->registerMetaTag($model->keywords, $model->description);

        $model->count_read++;
        $model->save(false);
        $model->content = str_replace('&lt;cut&gt;','',$model->content);

        $blogs = ArrayHelper::map(UserBlogsModel::find()->all(),'id',function ($row){
            return ['name' => $row->name, 'slug' => $row->slug];
        });
        $tags = ArrayHelper::map(UserTagsModel::find()->all(),'id',function ($row){
            return ['name' => $row->name, 'slug' => $row->slug];
        });
        return $this->render('view',[
            'model' => $model,
            'tags' => $tags,
            'blogs' => $blogs,
        ]);
    }
}