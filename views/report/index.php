<?php
/* @var $this yii\web\View */
use kartik\select2\Select2;

use yii\bootstrap4\Modal;
use yii\helpers\Html;



use kartik\date\DatePicker;

use kartik\orm\ActiveForm;


echo '<form  method="post"  action="/report/doc" >';

//echo Html :: csrfMetaTags();
echo '<label class="control-label">Начало периода</label>';
echo DatePicker::widget([
    'name' => 'begin',
    'type' => DatePicker::TYPE_COMPONENT_APPEND,
    'value' => '01-Jan-2020',
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'dd.mm.yy'
    ]
]);



echo '<label class="control-label">Конец периода</label>';
echo DatePicker::widget([
    'name' => 'end',
    'type' => DatePicker::TYPE_COMPONENT_APPEND,
    'value' => '01-Jan-2020',
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'dd.mm.yy'
    ]
]);


$data = [
    "01" => "отчет по ГСМ",
    "02" => "план работ",
    "03" => "blue",
    "orange" => "orange",
    "white" => "white",
    "black" => "black",
    "purple" => "purple",
    "cyan" => "cyan",
    "teal" => "teal"
];

echo '<br>';
 
 echo   Select2::widget([
    'name' => 'doc',
    'data' => $data,
    'size' => Select2::MEDIUM,
    'options' => ['placeholder' => 'Выбор документа ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);

echo '<br><button type="submit">запрос</button>';  

echo '</form>';


?>