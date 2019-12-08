<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 01.12.2019
 * Time: 19:41
 */

namespace app\helpers;

use Yii;

/**
 * Class SeoHelpers
 * @package app\helpers
 */
class SeoHelpers
{
    public static function registerMetaTag($keyword, $description)
    {
        Yii::$app->view->registerMetaTag([
            'name' => 'keyword',
            'content' => $keyword,
        ]);

        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $description,
        ]);
    }

    public static function getDefaultSeoData($route = null)
    {
        $data = [
            'site/index' => [
                'keyword' =>  t("shaxsiy blog, web dasturlash, opensource developer"),
                'description' =>  t("shaxsiy blog, web dasturlash"),
            ],
            'articles/index' => [
                'keyword' =>  t("shaxsiy blog, web dasturlash, opensource developer"),
                'description' =>  t("shaxsiy blog, web dasturlash"),
            ],
            'articles/view' => [
                'keyword' =>  t("shaxsiy blog, web dasturlash, opensource developer"),
                'description' =>  t("shaxsiy blog, web dasturlash"),
            ],
        ];

        return $data[$route]??null;
    }


}