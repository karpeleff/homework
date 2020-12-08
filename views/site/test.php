<?php
use kartik\select2\Select2;
use yii\web\JsExpression;
use yii\bootstrap4\Modal;


use kartik\date\DatePicker;

use kartik\orm\ActiveForm;

$data = [
    "SD6000E" => "SD6000E",
    "ADR16/5" => "ADR16/5",
    
];

$data2 = [
    "ПРОМСЕТЬ" => "ПРОМСЕТЬ",
    "ТО" => "ТО",
    
];




echo Select2::widget([
    'name' => 'sel_1',
    'language' => 'ru',
    'data' => $data,
    'options' => ['placeholder' => 'Выберите ДГУ'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);

echo '<br>';

echo Select2::widget([
    'name' => 'sel_2',
    'language' => 'ru',
    'data' => $data2,
    'options' => ['placeholder' => 'Выберите тип запуска'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);




echo '<label class="control-label">Birth Date</label>';
echo DatePicker::widget([
    'name' => 'dp_3',
    'type' => DatePicker::TYPE_COMPONENT_APPEND,
    'value' => '23-Feb-1982',
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'dd-M-yyyy'
    ]
]);


?>