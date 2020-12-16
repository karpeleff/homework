<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Benzin */

$this->title = 'Create Benzin';
$this->params['breadcrumbs'][] = ['label' => 'Benzins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="benzin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
