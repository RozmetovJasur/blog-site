<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use app\widgets\ActiveForm;

$this->title = t("Ro'yxatdan o'tish");
$this->params['breadcrumbs'][] = $this->title;
?>
<div class=" m-2">
    <p><?= t("Ro'yxatdan o'tish uchun quyidagi maydonlarni to'ldiring:"); ?></p>

    <?php $form = ActiveForm::begin(['id' => 'login-registration']); ?>

        <?= $form->field($model, 'fname')->textInput(['autocomplete' => "off"]) ?>
        <?= $form->field($model, 'email')->textInput(['autocomplete' => "off"]) ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'confirm')->passwordInput() ?>

        <?= Html::submitButton(t("Ro'yxatdan o'tish"), ['class' => 'btn btn-primary btn-xs']) ?>

    <?php ActiveForm::end(); ?>
</div>