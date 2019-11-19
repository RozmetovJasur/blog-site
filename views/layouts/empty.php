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
        <div class="row m-2">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <br/>
            <?= Html::getFlashMessages(); ?>
            <?= $content; ?>
        </div>
    </div>
</section>
<?= \app\widgets\FooterWidget::widget(); ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
