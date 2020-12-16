<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Benzin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="benzin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'prixod')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rasxod')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ostatok')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'creation')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
