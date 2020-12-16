<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "benzin".
 *
 * @property int $id
 * @property string $prixod
 * @property string $rasxod
 * @property string $ostatok
 * @property string $creation
 */
class Benzin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'benzin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prixod', 'rasxod', 'ostatok', 'creation'], 'required'],
            [['prixod', 'rasxod', 'ostatok', 'creation'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'prixod' => 'Prixod',
            'rasxod' => 'Rasxod',
            'ostatok' => 'Ostatok',
            'creation' => 'Creation',
        ];
    }
}
