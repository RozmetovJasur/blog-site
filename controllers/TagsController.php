<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 24.11.2019
 * Time: 20:48
 */

namespace app\controllers;


use app\components\ActiveDataProvider;
use app\components\Controller;
use app\models\UserArticlesModel;
use app\models\UserBlogsModel;
use app\models\UserTagsModel;
use yii\helpers\ArrayHelper;

/**
 * Class TagsController
 * @package app\controllers
 */
class TagsController extends Controller
{
    public function actionIndex($url = null)
    {
        /** @var UserTagsModel $tag */
        $tag = UserTagsModel::find()
            ->where(['slug' => $url])
            ->one();
        $query = UserArticlesModel::find();
        if($tag) {
            $query->where(['like', 'tag_id', $tag->id]);
            $this->registerMetaTag($tag->keywords, $tag->description);
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
}