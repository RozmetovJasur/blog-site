<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\helpers\Html;
use app\assets\AppAsset;
use app\widgets\Breadcrumbs;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?= \app\widgets\HeaderWidget::widget(); ?>
<section class="blog_area">
    <div class="container">
        <div class="row">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <div class="col-lg-8">
                <?= Html::getFlashMessages(); ?>
                <?= $content; ?>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Posts">
                            <span class="input-group-btn">
                <button class="btn btn-default" type="button"><i class="lnr lnr-magnifier"></i></button>
                </span>
                        </div>
                        <div class="br"></div>
                    </aside>
                    <?= \app\widgets\TopBlogsWidget::widget(); ?>
                    <?= \app\widgets\TopTagsWidget::widget(); ?>
                    <?= \app\widgets\TopArticlesWidget::widget(); ?>

                    <aside class="single_sidebar_widget author_widget">
                        <img class="author_img img-fluid" src="/uploads/img/no-photo.jpg" alt="">
                        <h4><?= t("Rozmetov Jasur"); ?></h4>
                        <p><?= t("Senior web developer"); ?></p>
                        <p><?= t("Shaxsiy blog"); ?></p>
                        <div class="social_icon">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-github"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </div>
                        <div class="br"></div>
                    </aside>
                </div>
                <div class="br"></div>
            </div>
        </div>
    </div>
</section>
<?= \app\widgets\FooterWidget::widget(); ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
