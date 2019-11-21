<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use app\widgets\ActiveForm;

$this->title = t("Kirish");
$this->params['breadcrumbs'][] = $this->title;
?>
<div class=" m-2">
    <p><?= t("Kirish uchun quyidagi maydonlarni to'ldiring:"); ?></p>

    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form->field($model, 'email')->textInput(['autocomplete' => "off"]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= Html::submitButton(t('Kirish'), ['class' => 'btn btn-primary btn-xs', 'name' => 'login-button']) ?>

    <?php ActiveForm::end(); ?>
</div>