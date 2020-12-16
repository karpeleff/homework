<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ExtinguisherSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Огнетушители';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="extinguisher-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить огнетушитель', ['create'], ['class' => 'btn btn-success']) ?>
         <?= Html::a('Печать стикеров', ['print'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'type',
            'number',
            'install_place',
           // 'factory_number',
            //'staff_type',
            'weight',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
