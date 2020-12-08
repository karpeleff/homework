<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form ActiveForm */

?>


<div class="test">

    <?php $form = ActiveForm::begin(); ?>

<?php
echo DatePicker::widget([
    'name'  => 'from_date',
    'value'  => $value,
    'language' => 'ru',
    //'dateFormat' => 'yyyy-MM-dd',
]);
    ?>
    

       
        <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>


</div><!-- test -->
