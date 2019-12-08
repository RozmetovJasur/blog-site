<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 19.11.2019
 * Time: 20:10
 */

namespace app\controllers;


use app\components\ActiveDataProvider;
use app\components\Controller;
use app\models\UserNewsModel;
use app\models\UserNewsCategoryModel;
use app\models\UserTagsModel;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

/**
 * Class NewsController
 * @package app\controllers
 */
class NewsController extends Controller
{
    public function actionIndex()
    {
        $url = Yii::$app->request->get('url', null);
        $blog = UserNewsCategoryModel::find()
            ->where(['slug' => $url])
            ->one();
        $query = UserNewsModel::find();

        if($blog)
            $query->where(['blog_id' => $blog->id]);

        $data = new ActiveDataProvider([
            'query' => $query->orderBy(['id' => SORT_ASC]),
            'pagination' => [
                'pageSize' => 20,
            ]
        ]);

        $category = ArrayHelper::map(UserNewsCategoryModel::find()->all(),'id',function ($row){
            return ['name' => $row->name, 'slug' => $row->slug];
        });

        return $this->render('index',[
            "data" => $data,
            "category" => $category,
        ]);
    }

    public function actionView($url)
    {
        $model = UserNewsModel::find()
            ->andFilterWhere(['slug' => $url])
            ->one();
        if(!$model)
            throw new NotFoundHttpException();

        $category = ArrayHelper::map(UserNewsCategoryModel::find()->all(),'id',function ($row){
            return ['name' => $row->name, 'slug' => $row->slug];
        });
        return $this->render('view',[
            'model' => $model,
            'category' => $category,
        ]);
    }
}