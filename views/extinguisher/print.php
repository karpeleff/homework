<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ExtinguisherSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Печать этикеток';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="extinguisher-index">

    <h1><?= Html::encode($this->title) ?></h1>

<button class="btn btn-success" onclick="window.print()">Распечатать</button>
<br><br>

 <style type="text/css">
.main{
   width: 335px;
   border:2px solid #000;
   text-align:center;
   font-family:"Times New Roman";
   font-weight: bold;
   font-size:11px;
   padding:3px 3px;
   margin: 2px 2px;
   float:left;
   min-height: 170px;
   border-radius: 8px;
  
}

@media print {
    div {
        page-break-inside: avoid;
    }
}

.centre {
  display: flex;
  flex-flow: row nowrap;


}

.top{
     border:1px solid #000;
   border-radius: 8px;

}

.one {
   width: 40%;
   height: 40%;
   border:1px solid #000;
   border-radius: 8px;
   margin: 2px ;
   padding:3px 3px;
}

.two{
    flex-basis: 60%;
     border:1px solid #000;
     border-radius: 8px;
     text-align:left;
     margin: 2px ;
     padding:3px 3px;
}


</style>


<?php 

foreach ($model as $item)
{

?>
 <div class="main">
    <div class="top">Вид технического обслуживания</div>
    <div class="centre">
        <div class="one">Осмотр огнетушителя  <?=$item['type']?> № <?=$item['number']?> снаружи 14.12.2020
         Вес: <?=$item['weight']?> кг. </div>
        <div class="one">Проверка качества ОТВ 14.12.2020 г.;  ВДПО г.Дальнереченск <?=$item['staff_type']?> </div>
        <div class="one">Гидравлическое (пневматическое) /дата,
                           величина испытательного  давления/ </div>
    </div>
    <div class="centre">
        <div class="two">ВЦ ОВД ОПРС Богуславец. Техник  РН. РЛ и связи Семенов П.Ф. </div>
        <div class="one">Дата проведения следующего испытания огнетушителя Март 2021г </div>
    </div>
 
      

</div>

<?php
 // <?=$item

}
?>


</div>


