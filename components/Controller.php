<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 16.11.2019
 * Time: 19:29
 */

namespace app\components;

use Yii;
use app\helpers\SeoHelpers;

/**
 * Class Controller
 * @package app\components
 */
class Controller extends \yii\web\Controller
{
    public $layout = 'main';
    public function registerMetaTag($keyword = null, $description = null)
    {
        if(!$keyword || !$description) {
            $route = Yii::$app->controller->id . '/' . Yii::$app->controller->action->id;
            $data = SeoHelpers::getDefaultSeoData($route);
            $keyword = $data['keyword']??null;
            $description = $data['description']??null;
        }
        SeoHelpers::registerMetaTag($keyword, $description);
    }
}