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
        <a class="justify-content-center ml-auto" href="#"><i class="lnr lnr lnr-bubble"></i><?= $model->count_comment; ?>  </a>
        <a class="m-1 justify-content-center ml-auto"><i class="fa fa-calendar" aria-hidden="true"></i> <?= $model->getCreatedAt(); ?></a>
        <?php /**<a class="m-1 justify-content-center ml-auto"><i class="fa fa-comments-o" aria-hidden="true"></i> <?= $model->count_comment; ?></a>*/ ?>
        <a class="m-1 justify-content-center ml-auto"><i class="fa fa-eye" aria-hidden="true"></i> <?= $model->count_read; ?></a>
        <div class="news_socail ml-auto">
            <?= \ymaker\social\share\widgets\SocialShare::widget([
                'configurator' => 'socialShare',
                'url'          => 'http://true.uz/'.\yii\helpers\Url::to(['articles/view', 'url' => $model->slug]),
                'title'        => $model->title,
                'description'  => $model->content,
                'imageUrl'     => \yii\helpers\Url::to($model->image, true),
                'linkContainerOptions' => [],
                'containerOptions' => [],
            ]); ?>
        </div>
    </div>
    <div class="comments-area">
        <h4> <?= t("Izohlar"); ?></h4>
        <div id="disqus_thread"></div>
        <script>
            (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = 'https://true-uz.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
        </script>
    </div>
</div>