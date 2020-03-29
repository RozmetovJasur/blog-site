<?php
use app\helpers\Html;
use yii\helpers\Url;
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 19.11.2019
 * Time: 19:58
 */

/** @var $category[] */
/** @var $this \yii\web\View */
/** @var $data \app\components\ActiveDataProvider */
/** @var $row \app\models\UserNewsModel */

$user = Yii::$app->user;
$this->title = t("Yangiliklar");
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if($data->models): ?>
    <?php foreach ($data->models as $row): ?>
        <div class="blog_left_sidebar">
            <article class="blog_style1">
                <?php if(!$user->isGuest && $row->user_id == $user->id): ?>
                    <p><?= Html::a(t('Tahrirlash'),['cabinet/update-article', 'id' => $row->id]); ?> </p>
                <?php endif; ?>
                <div class="blog_img">
                    <?= Html::img(Url::to('@web/'.$row->image),['class' => 'img-fluid']); ?>
                </div>
                <div class="blog_text">
                    <div class="blog_text_inner">
                        <div class="cat">
                            <?php if(is_array($row->category_id)): ?>
                                <?php foreach ($row->category_id as $key => $value): ?>
                                    <?php if(!isset($blogs[$value]))continue; ?>
                                    <?= Html::a($category[$value]['name'],['tags/index', 'url' => $category[$value]['slug'] ], ['class' => 'cat_btn']); ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <?= Html::a('<h4>'.$row->title.'</h4>',['news/view', 'url' => $row->slug]); ?>
                        <p><?= $row->contentCut; ?></p>

                        <div class="cat">
                            <span class="m-1"><i class="fa fa-calendar" aria-hidden="true"></i><?= $row->getCreatedAt(); ?></span>
                            <span class="m-1"><i class="fa fa-comments-o" aria-hidden="true"></i> <?= $row->count_comment; ?></span>
                            <span class="m-1"><i class="fa fa-eye" aria-hidden="true"></i> <?= $row->count_read; ?></span>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    <?php endforeach; ?>
    <?= \app\widgets\LinkPagerWidget::widget(['pagination' => $data->pagination]); ?>
<?php else: ?>
    <p class="alert alert-warning">
        <?= t("Hozircha yangiliklar mavjud emas."); ?>
        <?php /**
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
 * */ ?>
    </p>
<?php endif; ?>
