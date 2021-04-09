<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Motion */

$this->title = 'Create Motion';
$this->params['breadcrumbs'][] = ['label' => 'Motions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="motion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
