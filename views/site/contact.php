<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use app\widgets\ActiveForm;
use yii\captcha\Captcha;

$this->title = t("Bog'lanish va fikrlar");
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
        <p><?= t("Agar sizda savollar bo'lsa, ularni bizga yuborish uchun quyidagi formani to'ldiring. Biz siz bilan bog'lanamiz."); ?></p>
        <div class="row">
            <div class="col-lg-9">
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                    <?= $form->field($model, 'fname') ?>
                    <?= $form->field($model, 'email') ?>
                    <?= $form->field($model, 'title') ?>
                    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
                    <?= $form->field($model, 'verifyCode')->widget(Captcha::class, [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton(t("Jo'natish"), ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
</div>
