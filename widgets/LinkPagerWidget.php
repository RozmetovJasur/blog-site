<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 21.11.2019
 * Time: 20:50
 */

namespace app\widgets;


use yii\widgets\LinkPager;

/**
 * Class LinkPagerWidget
 * @package app\widgets
 */
class LinkPagerWidget extends LinkPager
{
    /**
     * Bootstrap 4 moslashtirildi.
     *
     * @var array
     */
    public $options = ['class' => 'pagination pagination-gap mt-30'];

    /**
     * Bootstrap 4 moslashtirildi.
     *
     * @var array
     */
    public $linkContainerOptions = ['class'=>'page-item'];

    /**
     * Bootstrap 4 moslashtirildi.
     *
     * @var array
     */
    public $linkOptions = ['class'=>'page-link'];

    /**
     * Bootstrap 4 moslashtirildi.
     *
     * @var array
     */
    public $prevPageCssClass = 'previous';

    /**
     * Bootstrap 4 moslashtirildi.
     *
     * @var array
     */
    public $disabledListItemSubTagOptions = ['class'=>'page-link'];
}