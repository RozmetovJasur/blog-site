<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 19.11.2019
 * Time: 19:59
 */

/** @var $list \app\models\UserArticlesModel [] */
?>
<?php if($list): ?>
<aside class="single_sidebar_widget popular_post_widget">
    <h3 class="widget_title"><?= t("Yangi maqolalar"); ?></h3>
    <?php foreach ($list as $row): ?>
    <div class="media post_item">
        <img style="width: 40%;" src="/<?= $row->image; ?>" alt="post">
        <div class="media-body">
            <?= \app\helpers\Html::a($row->title,['articles/view','url' => $row->slug]); ?>
            <p><?= $row->getCreatedAt(); ?></p>
        </div>
    </div>
    <?php endforeach; ?>
    <div class="br"></div>
</aside>
<?php endif; ?>