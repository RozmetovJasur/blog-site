<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 18.11.2019
 * Time: 21:07
 */

namespace app\widgets;

/**
 * Class ActiveForm
 * @package app\widgets
 */
class ActiveForm extends \yii\bootstrap\ActiveForm
{
    public $enableClientValidation = false;
    public $enableAjaxValidation = true;

    public $fieldClass = 'app\widgets\ActiveField';
    public $errorCssClass = "text-danger";
    public $fieldConfig = [
        'errorOptions' => ['class' => 'text-danger'],
    ];
}