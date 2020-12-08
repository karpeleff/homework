<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Energy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="energy-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'counter')->textInput(['maxlength' => true]) ?>

    <p  class="" >Дата</p>

    <?= DateTimePicker::widget([
    'model' => $model,
    'attribute' => 'date',
    'language' => 'ru',
    'size' => 'ms',
    'clientOptions' => [
    	'minuteStep' => 1,
        'autoclose' => true,
        'format' => 'dd MM yyyy - HH:ii P',
        'todayBtn' => true
    ]
]);?>

   <br>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
