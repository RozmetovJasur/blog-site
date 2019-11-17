<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 17.11.2019
 * Time: 19:08
 */
use yii\helpers\Html;
/** @var $menus [] */
/** @var $current_route string */

?>

<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
    <ul class="nav navbar-nav menu_nav">
        <?php foreach ($menus as $row):
            $title = isset($row["title"]) ? $row["title"] : "";
            $url = isset($row["url"]) ? $row["url"] : "";?>
            <li class="nav-item <?= in_array($current_route, $url) ? "active" : "";?>">
                <?= Html::a($title, $url, ['class' => 'nav-link']); ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <ul class="nav navbar-nav navbar-right header_social ml-auto">
        <?= \app\widgets\LangWidget::widget(); ?>
        <li class="nav-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
        <li class="nav-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
        <li class="nav-item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
        <li class="nav-item"><a href="#"><i class="fa fa-behance"></i></a></li>
    </ul>
</div>