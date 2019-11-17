<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 17.11.2019
 * Time: 17:46
 */

namespace app\behaviors;

use Yii;
use yii\web\Application;
use yii\base\Behavior;

/**
 * Class AppBehavior
 * @package app\behaviors
 */
class AppBehavior extends Behavior
{
    public function events()
    {
        return [
            Application::EVENT_BEFORE_REQUEST => "beforeRequest",
        ];
    }

    public function beforeRequest() {
        $lang = Yii::$app->request->get("lang");
        if($lang && array_key_exists($lang, Yii::$app->params["languages"]))
        {
            Yii::$app->session["lang"] = $lang;
        }

        if (!array_key_exists($lang, Yii::$app->params['languages'])) {
            if(isset(Yii::$app->session["lang"]))
                $lang = Yii::$app->session["lang"];
            else
                $lang = Yii::$app->params['defaultLanguage'];
        }

        Yii::$app->language = $lang;
    }
}