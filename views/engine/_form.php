<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\web\JsExpression;
use yii\bootstrap4\Modal;
use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Engine */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="engine-form">

    <?php $form = ActiveForm::begin(); ?>

<p>пуск</p>

 <?= DateTimePicker::widget([
    'model' => $model,
    'attribute' => 'start_time',
    'language' => 'ru',
    'size' => 'ms',
    'clientOptions' => [
    	'minuteStep' => 1,
        'autoclose' => true,
        'format' => 'dd-mm-yy  HH:ii P',
        'todayBtn' => true
    ]
]);?>

<br>
<p>останов</p>
   <?= DateTimePicker::widget([
    'model' => $model,
    'attribute' => 'stop_time',
    'language' => 'ru',
    'size' => 'ms',
    'clientOptions' => [
    	'minuteStep' => 1,
        'autoclose' => true,
        'format' => 'dd-mm-yy  HH:ii P',
        'todayBtn' => true
    ]
]);?>

   <br>
   <?php 

$items = [
	 "ADR16/5" => "ADR16/5",
    "SD6000E" => "SD6000E",
   
    
];

$status = [
    "Откл.промсети" => "Откл.промсети",
    "ТО" => "ТО",
    
];



?>

    <?= $form->field($model, 'engine_type')->dropDownList($items); ?>

    <?= $form->field($model, 'type_start')->dropDownList($status); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
