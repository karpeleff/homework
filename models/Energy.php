<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "energy".
 *
 * @property int $id
 * @property string $counter
 * @property string $date
 */
class Energy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'energy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['counter', 'date'], 'required'],
            [['counter', 'date'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'counter' => 'Counter',
            'date' => 'Date',
        ];
    }
}
