<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 19.11.2019
 * Time: 20:01
 */

namespace app\widgets;


use app\models\UserBlogsModel;
use yii\base\Widget;

/**
 * Class TopBlogsWidget
 * @package app\widgets
 */
class TopBlogsWidget extends Widget
{
    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function run()
    {
        $list = UserBlogsModel::find()
            ->orderBy(['id' => SORT_ASC])
            ->all();
        return $this->render('top-blogs',[
            'list' => $list,
        ]);
    }
}