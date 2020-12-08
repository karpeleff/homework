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
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd-mm-yy'
        ]
]);?>

<br>
 <?= DatePicker::widget([
    'model' => $model,
    'attribute' => 'end_period',
    'template' => '{addon}{input}',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd-mm-yy'
        ]
]);?>



<?= $form->field($model, 'report_type')->dropDownList(['1' => 'отчет по ДЭС', '2' => 'план  работ', '3' => 'списание снегоуборщик']); ?>

<br>

<?=Html::submitButton('Сформировать', ['class' => 'btn btn-primary']);?>


<?php
ActiveForm::end();
?>