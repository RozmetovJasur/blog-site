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
        <a class="m-1 justify-content-center ml-auto"><i class="fa fa-comments-o" aria-hidden="true"></i> <?= $model->count_comment; ?></a>
        <a class="m-1 justify-content-center ml-auto"><i class="fa fa-eye" aria-hidden="true"></i> <?= $model->count_read; ?></a>
        <div class="news_socail ml-auto">
            <?= \ymaker\social\share\widgets\SocialShare::widget([
                'configurator' => 'socialShare',
                'url'          => \yii\helpers\Url::to('absolute/route/to/page', true),
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
        <?php if(!$user->isGuest): ?>
            <div id="disqus_thread"></div>
            <script>

                /**
                 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                /*
                var disqus_config = function () {
                this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                };
                */
                (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document, s = d.createElement('script');
                    s.src = 'https://true-uz.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

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