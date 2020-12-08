<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ExtinguisherSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Extinguishers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="extinguisher-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Extinguisher', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'type',
            'number',
            'install_place',
            'staff_type',
            //'weight',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
