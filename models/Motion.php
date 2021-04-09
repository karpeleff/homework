<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "motion".
 *
 * @property int $id
 * @property string $name
 * @property string|null $move
 * @property int|null $count
 * @property string|null $time
 */
class Motion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'motion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['count'], 'integer'],
            [['time'], 'safe'],
            [['name', 'move'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'move' => 'Move',
            'count' => 'Count',
            'time' => 'Time',
        ];
    }
}
