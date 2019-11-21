<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 17.11.2019
 * Time: 19:59
 */

namespace app\widgets;

/**
 * Class Breadcrumbs
 * @package app\widgets
 */
class Breadcrumbs extends \yii\widgets\Breadcrumbs
{
    /**
     * @inheritdoc
     */
    public $options = ['class' => 'col-lg-12 breadcrumb bg-light'];

    /**
     * @inheritdoc
     */
    public $homeLink = [
        'label'  => '<i class="fa fa-home"></i>',
        'encode' => false,
        'url'    => ['site/index']
    ];

    /**
     * @inheritdoc
     */
    public $itemTemplate = "<li class='breadcrumb-item text-black'>{link}</li>\n";

    /**
     * @inheritdoc
     */
    public $activeItemTemplate = "<li class=\"breadcrumb-item active\">{link}</li>\n";
}