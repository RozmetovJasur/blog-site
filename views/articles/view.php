<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 25.11.2019
 * Time: 15:22
 */

use app\helpers\Html;

/** @var $this \yii\web\View */
/** @var $model \app\models\UserArticlesModel */
/** @var $tags [] */
/** @var $blogs [] */
$user = Yii::$app->user;
$this->title = $model->title;
$this->params['breadcrumbs'][] =['label' => t("Maqolalar"), 'url' => ['articles/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main_blog_details">
    <div class="user_details">
        <div class="float-left">
            <?php if(is_array($model->blog_id)): ?>
                <?php foreach ($model->blog_id as $key => $value): ?>
                    <?php if(!isset($blogs[$value]))continue; ?>
                    <?= Html::a($blogs[$value]['name'],['tags/index', 'url' => $blogs[$value]['slug'] ]); ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="float-right">
            <div class="media">
                <div class="media-body">
                    <h5><?= $model->user->fi; ?></h5>
                    <p><?= date("d/m/Y H:m:s",strtotime($model->created_at)); ?></p>
                </div>
                <div class="d-flex">
                    <img src="/template/img/blog/user-img.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <?= $model->content; ?>

    <div class="user_details">
        <div class="float-left">
            <span><?= t("Teglar").':'; ?></span>
            <?php if(is_array($model->tag_id)): ?>
                <?php foreach ($model->tag_id as $key => $value): ?>
                    <?php if(!isset($tags[$value]))continue; ?>
                    <?= Html::a($tags[$value]['name'],['tags/index', 'url' => $tags[$value]['slug'] ], ['class' => 'cat_btn']); ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="news_d_footer">
        <a href="#"><i class="lnr lnr lnr-heart"></i>Lily and 4 people like this</a>
        <a class="justify-content-center ml-auto" href="#"><i class="lnr lnr lnr-bubble"></i><?= $model->count_comment; ?>  </a>
        <div class="news_socail ml-auto">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-youtube-play"></i></a>
            <a href="#"><i class="fa fa-pinterest"></i></a>
            <a href="#"><i class="fa fa-rss"></i></a>
        </div>
    </div>
    <div class="comments-area">
        <h4> <?= t("Izohlar"); ?></h4>
        <?php if(!$user->isGuest): ?>
        <div class="comment-list">
            <div class="single-comment justify-content-between d-flex">
                <div class="user justify-content-between d-flex">
                    <div class="thumb">
                        <img src="img/blog/c1.jpg" alt="">
                    </div>
                    <div class="desc">
                        <h5><a href="#">Emilly Blunt</a></h5>
                        <p class="date">December 4, 2017 at 3:12 pm </p>
                        <p class="comment">
                            Never say goodbye till the end comes!
                        </p>
                    </div>
                </div>
                <div class="reply-btn">
                    <a href="#" class="btn-reply text-uppercase">reply</a>
                </div>
            </div>
        </div>
        <div class="comment-list left-padding">
            <div class="single-comment justify-content-between d-flex">
                <div class="user justify-content-between d-flex">
                    <div class="thumb">
                        <img src="img/blog/c2.jpg" alt="">
                    </div>
                    <div class="desc">
                        <h5><a href="#">Elsie Cunningham</a></h5>
                        <p class="date">December 4, 2017 at 3:12 pm </p>
                        <p class="comment">
                            Never say goodbye till the end comes!
                        </p>
                    </div>
                </div>
                <div class="reply-btn">
                    <a href="#" class="btn-reply text-uppercase">reply</a>
                </div>
            </div>
        </div>
        <div class="comment-list">
            <div class="single-comment justify-content-between d-flex">
                <div class="user justify-content-between d-flex">
                    <div class="thumb">
                        <img src="img/blog/c5.jpg" alt="">
                    </div>
                    <div class="desc">
                        <h5><a href="#">Ina Hayes</a></h5>
                        <p class="date">December 4, 2017 at 3:12 pm </p>
                        <p class="comment">
                            Never say goodbye till the end comes!
                        </p>
                    </div>
                </div>
                <div class="reply-btn">
                    <a href="#" class="btn-reply text-uppercase">reply</a>
                </div>
            </div>
        </div>
        <?php else: ?>
        <?= t("Fikr bildirish uchun {enter} yoki {regis}!",[
                'enter' => Html::a(t("saytga kiring"),['site/login']),
                'regis' => Html::a(t("ro‘yxatdan o‘ting"),['site/login']),
            ]); ?>
        <?php endif; ?>
    </div>
</div>