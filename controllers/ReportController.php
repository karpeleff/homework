<?php

namespace app\controllers;

use Yii;
use app\models\UploadForm;
use app\models\Docs;
use app\models\Engine;
use yii\web\UploadedFile;
use yii\helpers\VarDumper;
use \PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
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

  public function actionTest()
    {

    	return $this->render('test');
     // VarDumper::dump($convert);
    }


   public function actionEmployer()
   {
    $inputFileName = 'uploads/graf.xlsx';
    $inputFileType = 'Xlsx';
    $sheetname = 'Лист1';
    $reader = IOFactory::createReader($inputFileType);
    $reader->setLoadSheetsOnly($sheetname);
    $spreadsheet = $reader->load($inputFileName);
    $cellValue = $spreadsheet->getActiveSheet()->getCell('A3');


//echo $cellValue;
   
$range = 'F4:F8';

$now = new DateTime("now");





$dataArray = $spreadsheet->getActiveSheet()
    ->rangeToArray(
        $range,     // The worksheet range that we want to retrieve
        NULL,        // Value that should be returned for empty cells
        TRUE,        // Should formulas be calculated (the equivalent of getCalculatedValue() for each cell)
        TRUE,        // Should values be formatted (the equivalent of getFormattedValue() for each cell)
        TRUE         // Should the array be indexed by cell row and cell column
    );

//echo "<pre>";
//var_dump($now);
//echo "</pre>";
   
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

switch ($data[2]) {
	    case '1':
		$this->createSpr($data);
		break;
		case '2':
		$this->createYearReport($data);
		break;
		case '3':
		
		break;
		case '4':
		# code...
		break;
		case '5':
		# code...
		break;
		case '6':
		$this->createMonthPlan($data);
		break;
	
	default:
		# code...
		break;

     }



}


public function createSpr($data)
{


  $mons  =  substr($data[0] , 5, 2);

  $year  =  substr($data[0],0,4);

  $last_day = cal_days_in_month(CAL_GREGORIAN, $mons, $year); //последний день месяца


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
                   ->where(['between', 'start_time',$data[0],$data[1]])
                   ->orderBy('start_time')
                   ->all();

 $i = 1;

 $itog_sd  = [];
 $itog_adr = [];

$count = count($rows);// количество полей

$templateProcessor   = new TemplateProcessor('templates/template_dizel_work.docx');
$templateProcessor_2 = new TemplateProcessor('templates/template_akt_spis.docx');//

$templateProcessor->cloneRow('des_type', $count);// клонируем поля в документе

foreach($rows as $item)//начало цикла
  {

	$hour =   substr ($item['work_time'],0,2);

	$min  =   substr ($item['work_time'],3,2);

	$itog = ($hour * 60) + ($min) ;

	$itog = ($itog / 60);

	$itog = round($itog, 2);

    $templateProcessor->setValue(array
                                              ('des_type#'    . $i,
                                               'start_date#'  . $i,
                                               'start_time#'  . $i,
                                               'stop_date#'   . $i,
                                               'stop_time#'   . $i,
                                               'amount#'      . $i,
                                               'reason#'      . $i),
                                                
                                                 array( $item['engine_type'], 
                                                        substr ($item['start_time'],0,10),
                                                        substr ($item['start_time'],11,5),
                                                        substr ($item['stop_time'], 0,10),
                                                        substr ($item['stop_time'],11,5),
                                                                $itog , 
                                                                $item['type_start']));

   $i++;

 if ($item['engine_type'] === 'ADR16.5')//подсчет общего времени работы ДГУ
            {
                $itog_adr[] = $itog;
            } else
            {
                $itog_sd[]  = $itog;
            }

    }// конец цикла


    $sd  = array_sum($itog_sd);

    $adr = array_sum($itog_adr);

    $templateProcessor->setValue('itog_adr',$adr);

	$templateProcessor->setValue('itog_sd',$sd);

    $templateProcessor->setValue('mons',$_monthsList[$mons]);

    $templateProcessor->setValue('year',$year);

    $templateProcessor->setValue('last',$last_day);

/////////////////////

    $templateProcessor_2 = new TemplateProcessor('templates/template_akt_spis.docx');


    $rate_sd  = $sd  * 1.9;

    $rate_adr = $adr * 2.7;

    $rate_sd  = round($rate_sd,2);

    $rate_adr = round($rate_adr,2);

    $common   = $rate_sd + $rate_adr;

    $templateProcessor_2->setValue('itog_adr',$adr);

	$templateProcessor_2->setValue('itog_sd',$sd);

    $templateProcessor_2->setValue('mons',$_monthsList[$mons]);

    $templateProcessor_2->setValue('year',$year);

    $templateProcessor_2->setValue('last',$last_day);

    $templateProcessor_2->setValue('rate_adr',$rate_adr);

    $templateProcessor_2->setValue('rate_sd',$rate_sd);

    $templateProcessor_2->setValue('itog',$common);






    $templateProcessor->saveAs("uploads/Справка о работе дизелей за ".$_monthsList_1[$mons]." ".$year." г.docx");

    $templateProcessor_2->saveAs("uploads/Акт списания ГСМ дизель за ".$_monthsList_1[$mons]." ".$year." г.docx");

}

public function  createYearReport($data)
{

	$year  =  substr($data[0],0,4);



// Откл.промсети  SD6000E   ADR16.5    ТО


     $type_start = 'ТО';

     $type_engine = 'SD6000E';

	 $templateProcessor   = new TemplateProcessor('templates/template_form_otchet_god.docx');


  // $result = $this->timeCalculation($year,$type_start,$type_engine);

	  $result = $this->timeCalculation($year,$type_start,$type_engine);

       echo $result[0];

       echo '<br>';

       echo $result[1];

       echo '<br>';



}


public function  timeCalculation($year,$type_start,$type_engine)

{

	 $out = [];

     $count_off = Engine::find()
                              ->where(['type_start'        => $type_start])
                              ->andWhere(['engine_type'    => $type_engine])
                              ->count();

           $row = Engine::find()
                              ->asArray()
                              ->where   (['type_start'     =>  $type_start])
                              ->andWhere('YEAR(start_time) ='        .$year)
                              ->andWhere(['engine_type'    => $type_engine])
                              ->all();  

$full_time = [];


// $count_off;

foreach($row as $item)
{
	$hour =   substr ($item['work_time'],0,2);

	$min  =   substr ($item['work_time'],3,2);

	$full_time[] =   ($hour * 60) + ($min) ;	

}

    $itog_off = array_sum($full_time);

    $itog_off = ($itog_off / 60);

	$itog_off = round($itog_off, 2);

	$out[0] = $itog_off;

	$out[1] = $count_off;

    return   $out;


}


public function createMonthPlan($data)
{
	
$arr = $this->calc($data);

$templateProcessor   = new TemplateProcessor('templates/template_mons_plan.docx');
$templateProcessor->setValue('y',$arr['year']);
$templateProcessor->setValue('m_t',$arr['mons_text_2']);
$templateProcessor->setValue('m_d',$arr['mons_digit']);
$templateProcessor->setValue('l',$arr['last_day']);
$templateProcessor->saveAs("uploads/План работ на  ".$arr['mons_text_2']." ".$arr['year']." г.docx");

}

public  function  calc($data)
{
  
$List_1 = array(
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

$List_2 = array(
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

     $arr = [];

     $arr['mons_digit']  =  substr($data[0] , 5, 2); 

     $arr['year']        =  substr($data[0],0,4);

     $arr['last_day']    = cal_days_in_month(CAL_GREGORIAN, $arr['mons_digit'], $arr['year']);

     $arr['mons_text_1'] = $List_1[$arr['mons_digit']];

     $arr['mons_text_2'] = $List_2[$arr['mons_digit']];

     return $arr; 



}


}
