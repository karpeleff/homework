<?php

namespace app\models;

class Docs extends \yii\base\Model
{
    public $begin_period ;
    public $end_period;
    public $report_type;

  
      public function rules()
    {
        return [
            [['begin_period','end_period','report_type'], 'required'],
           
        ];
    }

public   static function  getAll()
{
	return [0=>$begin_period,1=>$end_period,2=>$report_type];
}

}


?>