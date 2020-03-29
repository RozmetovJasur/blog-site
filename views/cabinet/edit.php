<?php

/* @var $this yii\web\View */
/* @var $blogs [] */
/* @var $tags [] */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\UserArticlesModel */

use app\helpers\Html;
use app\widgets\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Url;

$this->title = t("Maqola");
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-lg-9">
    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'blog_id')->widget(\kartik\select2\Select2::class, [
            'data' => $blogs,
            'options' => ['placeholder' => t("Blogni tanlang..."), 'multiple' => true],
            'pluginOptions' => [
                'maximumInputLength' => 20
            ],
        ]) ?>
        <?= $form->field($model, 'title')->textInput(); ?>
        <?= $form->field($model, 'content')->widget(\mihaildev\ckeditor\CKEditor::class,[
            'editorOptions' => [
                'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                'inline' => false, //по умолчанию false
            ]
        ]) ?>
        <br>
        <?php if ($model->image): ?>
            <?= Html::img(Url::to('@web/'.$model->image),['class' => 'img-fluid']); ?><br><br>
        <?php endif; ?>

        <?= $form->field($model, 'image')->fileInput(); ?>

        <?= $form->field($model, 'tag_id')->widget(\kartik\select2\Select2::class, [
            'data' => $tags,
            'options' => ['placeholder' => t("Tagni tanlang..."), 'multiple' => true],
            'pluginOptions' => [
                'tags' => true,
                'tokenSeparators' => [',', ' '],
                'maximumInputLength' => 20
            ],
        ]) ?>
    <div class="form-group">
            <?= Html::submitButton(t("Jo'natish"), ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>
<div class="col-lg-3">
    Uzun maqolalarni &lt;cut&gt; </pre> tagi orqali  qisman yashirish mumkin va matn ostida "davomini o'qish" havolasi paydo bo'ladi. Yashirilgan qismi blogda ko'rinmaydi, lekin maqola ochilganda to'liq ko'rinadi..
</div>