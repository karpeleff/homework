<?php

use yii\helpers\Html;

//use yii\bootstrap\ActiveForm;

 use   yii\widgets\ActiveForm;

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
/* Сюда добавляем поля формы */
ActiveForm::end();

?>