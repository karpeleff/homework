<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BenzinSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Benzins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="benzin-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Benzin', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'prixod',
            'rasxod',
            'ostatok',
            'creation',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
