<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 18.11.2019
 * Time: 21:08
 */

namespace app\widgets;

/**
 * Class ActiveField
 * @package app\widgets
 */
class ActiveField extends \yii\bootstrap\ActiveField
{
    public function textInput($options = [])
    {
        return parent::textInput($options);
    }

    public function textarea($options = [])
    {
        return parent::textarea($options);
    }
}