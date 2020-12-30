<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Engine */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="engine-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'start_time')->textInput() ?>

    <?= $form->field($model, 'stop_time')->textInput() ?>

    <?= $form->field($model, 'engine_type')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'type_start')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
