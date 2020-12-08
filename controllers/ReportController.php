<?php

namespace app\controllers;

use Yii;
use app\models\UploadForm;
use app\models\Docs;
use app\models\Engine;
use yii\web\UploadedFile;
use \PhpOffice\PhpWord\TemplateProcessor;
use DateTime;


class ReportController extends \yii\web\Controller
{
   
public function beforeAction($action)
	{
		$this->enableCsrfValidation = false;
		
		return parent :: beforeAction($action);
	}




    public function actionIndex()
    {
        return $this->render('index');
    }


     public function actionInput()
    {
        return $this->render('input_form');
    }



 public function actionDoc()
    {

 $model = new Docs();

if(Yii::$app->request->isPost)
{
	$model->load(Yii::$app->request->post());

	$data = [$model->begin_period,$model->end_period,$model->report_type];

   $this->Create_doc($data);
}
       return $this->render('doc', ['model' => $model]);
    }
         

 public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->render('upload', ['model' => $model]);
    }


public function  Create_doc($data)
{
	
  $query =  substr($data[0] , 3, 5);

  $mons = substr($data[0] , 3, 2);

  $year = substr($data[0],6,2);//две цифры года

  $last_day = cal_days_in_month(CAL_GREGORIAN, $mons, $year); //последний день месяца


switch ($data[2]) {
	    case '1':
		# code...
		break;
		case '2':
		# code...
		break;
		case '3':
		# code...
		break;
		case '4':
		# code...
		break;
	
	default:
		# code...
		break;
}




$_monthsList = array(
  "01" => "января",
  "02" => "февраля",
  "03" => "марта",
  "04" => "апреля",
  "05" => "мая",
  "06" => "июня",
  "07" => "июля",
  "08" => "августа",
  "09" => "сентября",
  "10" => "октября",
  "11" => "ноября",
  "12" => "декабря"
);


$_monthsList_1 = array(
  "01" => "январь",
  "02" => "февраль",
  "03" => "март",
  "04" => "апрель",
  "05" => "май",
  "06" => "июнь",
  "07" => "июль",
  "08" => "август",
  "09" => "сентябрь",
  "10" => "октябрь",
  "11" => "ноябрь",
  "12" => "декабрь"
);



 $rows = Engine::find()
                     ->asArray()
                     ->where( ['like', 'start_time', $query])
                     ->orderBy('id')
                     ->all();//выбираем   данные за  запрошенный   период 

$i = 1;

$count = count($rows);// количество полей

///echo $count;



$templateProcessor = new TemplateProcessor('uploads/template_dizel_work.docx');//

$templateProcessor->cloneRow('des_type', $count);// клонируем поля в документе

//die;

foreach($rows as $item)
{

   $work_time = (strtotime($item['stop_time']) - strtotime($item['start_time'])) / 60 ; // работа в минутах
  

  $templateProcessor->setValue(array
                                              ('des_type#'    . $i,
                                               'start_date#'  . $i,
                                               'start_time#'  . $i,
                                               'stop_date#'   . $i,
                                               'stop_time#'   . $i,
                                               'amount#'      . $i,
                                               'reason#'      . $i),
                                                
                                                 array( $item['engine_type'], 
                                                        substr ($item['start_time'],0,8),
                                                        substr ($item['start_time'],8,7),
                                                        substr ($item['stop_time'], 0,8),
                                                        substr ($item['stop_time'],8,7),
                                                      round(($work_time / 60), 2)  , //время работы в часах и сотых долях часа
                                                        $item['type_start']));

   $i++;


}


    $templateProcessor->setValue('mons',$_monthsList[$mons]);

    $templateProcessor->setValue('year',$year);

    $templateProcessor->setValue('last',$last_day);

    $templateProcessor->saveAs("uploads/Справка о работе дизелей за ".$_monthsList_1[$mons].".docx");


}


}
