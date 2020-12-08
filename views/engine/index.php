<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EngineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Engines';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="engine-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Engine', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'start_time',
            'stop_time',
            'engine_type',
            'type_start',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
