<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 19.11.2019
 * Time: 20:03
 */
use app\helpers\Html;
/** @var $list \app\models\UserTagsModel [] */
?>

<aside class="single-sidebar-widget tag_cloud_widget">
    <h4 class="widget_title"><?= t("Teglar"); ?></h4>
    <ul class="list">
        <?php foreach ($list as $row): ?>
            <li>
                <?= Html::a($row->name,['tags/index', 'url' => $row->slug]); ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <div class="br"></div>
</aside>
