<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "engine".
 *
 * @property int $id
 * @property string $start_time
 * @property string $stop_time
 * @property string $engine_type
 * @property string $type_start
 */
class Engine extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'engine';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['start_time', 'stop_time', 'engine_type', 'type_start'], 'required'],
            [['start_time', 'stop_time', 'engine_type', 'type_start'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'start_time' => 'Start Time',
            'stop_time' => 'Stop Time',
            'engine_type' => 'Engine Type',
            'type_start' => 'Type Start',
            'work_time'  =>  'Work Time'
        ];
    }
}
