<?php 

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use dosamigos\datetimepicker\DateTimePicker;
use dosamigos\datepicker\DatePicker;

$form = ActiveForm::begin([
   // идентификатор формы
   'id' => 'contact-form',
    'options' => [
	// класс формы
        'class' => 'form-horizontal',
        // возможность загрузки файлов
        'enctype' => 'multipart/form-data'
     ],
]);

?>  
<h1>Сформировать документы за период</h1>
 <?= DatePicker::widget([
    'model' => $model,
    'attribute' => 'begin_period',
    'template' => '{addon}{input}',
     'language' => 'ru',
        'clientOptions' => [
            'autoclose' => true,
            //'format' => 'dd-mm-yyyy',
            'format' => 'yyyy-mm-dd 00:00:00',

        ]
]);?>

<br>
 <?= DatePicker::widget([
    'model' => $model,
    'attribute' => 'end_period',
    'template' => '{addon}{input}',
     'language' => 'ru',
        'clientOptions' => [
            'autoclose' => true,
            //'format' => 'dd-mm-yyyy'
            'format' => 'yyyy-mm-dd 23:59:59',
        ]
]);?>

<br>

<?= $form->field($model, 'report_type')->dropDownList([
                                                       '1' => 'Справка о работе дизелей',
                                                       '2' => 'Годовой отчет по наработке дизелей',
                                                       '3' => 'Акт списания  снегоуборщик',
                                                       '4' => ' Акт списания триммер',
                                                       '5' => 'сводный отчет ГСМ',
                                                       '6' => 'План работ',

                                                      ]); ?>

<br>

<?=Html::submitButton('Сформировать', ['class' => 'btn btn-primary']);?>


<?php
ActiveForm::end();
?>