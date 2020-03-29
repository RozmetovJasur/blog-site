<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 19.11.2019
 * Time: 19:54
 */

/** @var $list \app\models\UserBlogsModel [] */
/** @var $this \yii\web\View */

use app\helpers\Html;

$this->title = t("Bloglar");
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if($list): ?>
<div class="section-border">
    <?php foreach ($list as $row): ?>
        <div class="section-top-border">
            <h3 class="mb-30 title_color"><?= Html::a($row->name,['articles/index','url' => $row->slug]); ?></h3>
                <div class="col-lg-8">
                    <blockquote class="generic-blockquote">
                        <?= $row->info; ?>
                    </blockquote>
                    <div>
                        <div class="pull-left">
                            <?= t("Maqolalar soni"); ?>
                            <?= $row->count_article; ?>
                        </div>
                        <div class="pull-right">
                            <?= $row->user ? $row->user->fi : ""; ?>
                            <?= date("d/m/Y",strtotime($row->created_at)); ?>
                        </div>
                    </div>
                </div>
        </div>
    <?php endforeach; ?>
</div>
<?php else: ?>
    <p class="alert alert-warning">
        <?= t("Hozircha bloglar mavjud emas,lekin siz birinchi bo'lishingiz mumkin. "); ?>
        <?php if(Yii::$app->user->isGuest): ?>
            <?= t("Buning uchun {enter} yoki {regis}!",[
                'enter' => Html::a(t("saytga kiring"),['site/login']),
                'regis' => Html::a(t("ro‘yxatdan o‘ting"),['site/login']),
            ]); ?>
        <?php else: ?>
            <?= t("Yangi {article} yoki {news} qo'shing!",[
                'article' => Html::a(t("maqola"),['cabinet/add-article']),
                'news' => Html::a(t("yangilik"),['cabinet/add-news']),
            ]); ?>
        <?php endif; ?>
    </p>
<?php endif; ?>