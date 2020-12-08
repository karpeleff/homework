<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Extinguisher */

$this->title = 'Create Extinguisher';
$this->params['breadcrumbs'][] = ['label' => 'Extinguishers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="extinguisher-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
