<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

use kartik\datetime\DateTimePicker;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <code><?= __FILE__ ?></code>

<?php
echo '<label>Start Date/Time</label>';
echo DateTimePicker::widget([
    'name' => 'datetime_10',
    'options' => ['placeholder' => 'Select operating time ...'],
    'convertFormat' => true,
    'pluginOptions' => [
    	 'autoclose'=>true,
    	 'format' => 'dd-M-yyyy h:i',
        
        'startDate' => '01-Jen-2020 12:00 AM',
        'todayHighlight' => true
    ]
]);


?>

</div>
