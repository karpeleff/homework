<?php

namespace app\controllers;

use Yii;
use app\models\UploadForm;
use app\models\Docs;
use app\models\Engine;
use yii\web\UploadedFile;
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
    $convert = [
      '1'=>'B',
      '2'=>'C',
      '3'=>'D',
      '4'=>'E',
      '5'=>'F',
      '6'=>'G',
      '7'=>'H',
      '8'=>'I',
      '9'=>'J',
      '10'=>'K',
      '11'=>'L',
      '12'=>'M',
      '13'=>'N',
      '14'=>'O',
      '15'=>'P',
      '16'=>'Q',
      '17'=>'R',
      '18'=>'S',
      '19'=>'T',
      '20'=>'U',
      '21'=>'V',
      '22'=>'W',
      '23'=>'X',
      '24'=>'Y',
      '25'=>'Z',
      '26'=>'AA',
      '27'=>'AB',
      '28'=>'AC',
      '29'=>'AD',
      '30'=>'AE',
      '31'=>'AF'
    ];

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

echo "<pre>";
var_dump($now);
echo "</pre>";
   
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
		echo "нет метода";
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



}


public function createSpr($data)
{

 //$query =  substr($data[0] , 3, 7);

  //2020-12-02 09:00:00    25-02-2020 01:10

//$begin = substr($data[0] , 3, 7);

//$end   = substr($data[1] , 3, 7);

//$begin = substr($data[0] , 0, 7);

//$end   = substr($data[1] , 0, 7);

/*echo $begin;
echo '<br>';
echo $end;

die;*/


 // $mons  =  substr($data[0] , 3, 2);

 // $year  =  substr($data[0],6,4);//

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



 /*$rows = Engine::find()
                     ->asArray()
                     ->where( ['like', 'start_time', $query])
                     ->orderBy('id')
                     ->all();//выбираем   данные за  запрошенный   период 
*/



$rows = Engine::find()
                   ->asArray()
                   ->where(['between', 'start_time',$data[0],$data[1]])
                   ->orderBy('start_time')->all();

 //$rows = Engine::find()->asArray()->where(['like', 'start_time',[$begin, $end]  ])->orderBy('id')->all();
 //$rows = Engine::find()->asArray()->where(['in', 'start_time',[$begin, $end ] ])->all();



$i = 1;

 $itog_sd  = [];
 $itog_adr = [];

$count = count($rows);// количество полей

$templateProcessor   = new TemplateProcessor('uploads/template_dizel_work.docx');
$templateProcessor_2 = new TemplateProcessor('uploads/template_akt_spis.docx');//

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

    $templateProcessor_2 = new TemplateProcessor('uploads/template_akt_spis.docx');


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


}
