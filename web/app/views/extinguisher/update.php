<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Extinguisher */

$this->title = 'Update Extinguisher: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Extinguishers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="extinguisher-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
