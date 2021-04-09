<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MotionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Motions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="motion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Motion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'move',
            'count',
            'time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
