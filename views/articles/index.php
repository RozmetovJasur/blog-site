<?php
/**
 *
 * Created by PhpStorm.
 * User: Rozmetov Jasur ( @rozmetovjasur )
 * Date: 19.11.2019
 * Time: 19:58
 */
/** @var $this \yii\web\View */
/** @var $data \app\components\ActiveDataProvider */
/** @var $row \app\models\UserArticlesModel */
$this->title = t("Maqolalar");
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if($data->models): ?>
    <?php foreach ($data->models as $row): ?>
        <div class="blog_left_sidebar">
            <article class="blog_style1">
                <div class="blog_img">
                    <img class="img-fluid" src="/template/img/home-blog/blog-1.jpg" alt="">
                </div>
                <div class="blog_text">
                    <div class="blog_text_inner">
                        <div class="cat">
                            <a class="cat_btn" href="#">Gadgets</a>
                            <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> March 14, 2018</a>
                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 05</a>
                        </div>
                        <a href="#">
                            <h4>Nest Protect: 2nd Gen Smoke + CO Alarm</h4>
                        </a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                        <a class="blog_btn" href="#">Read More</a>
                    </div>
                </div>
            </article>
        </div>
    <?php endforeach; ?>
    <?= \app\widgets\LinkPagerWidget::widget(['pagination' => $data->pagination]); ?>
<?php endif; ?>
