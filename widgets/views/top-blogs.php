<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 19.11.2019
 * Time: 20:01
 */
use app\helpers\Html;
/** @var $list \app\models\UserBlogsModel [] */
?>

<aside class="single_sidebar_widget post_category_widget">
    <h4 class="widget_title"><?= t("Bloglar"); ?></h4>
    <ul class="list cat-list">
        <?php foreach ($list as $row): ?>
        <li>
            <?= Html::a('<p>'.$row->name.'</p>'.'<p>'.$row->count_article.'</p>',
                ['articles/index', 'url' => $row->slug],
                ['class' => 'd-flex justify-content-between']); ?>
        </li>
        <?php endforeach; ?>
    </ul>
    <div class="br"></div>
</aside>
