<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "extinguisher".
 *
 * @property int $id
 * @property string $type
 * @property int $number
 * @property string|null $install_place
 * @property int|null $factory_number
 * @property string $staff_type
 * @property float $weight
 */
class Extinguisher extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'extinguisher';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'number', 'staff_type', 'weight'], 'required'],
            [['number', 'factory_number'], 'integer'],
            [['weight'], 'number'],
            [['type', 'install_place', 'staff_type'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Тип',
            'number' => 'Номер',
            'install_place' => 'Место установки',
            'factory_number' => 'Заводской номер',
            'staff_type' => 'Тип вещества',
            'weight' => 'Вес',
        ];
    }
}
