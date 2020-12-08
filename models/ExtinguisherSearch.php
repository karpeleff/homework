<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Extinguisher;

/**
 * ExtinguisherSearch represents the model behind the search form of `app\models\Extinguisher`.
 */
class ExtinguisherSearch extends Extinguisher
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'number', 'factory_number'], 'integer'],
            [['type', 'install_place', 'staff_type'], 'safe'],
            [['weight'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Extinguisher::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'number' => $this->number,
            'factory_number' => $this->factory_number,
            'weight' => $this->weight,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'install_place', $this->install_place])
            ->andFilterWhere(['like', 'staff_type', $this->staff_type]);

        return $dataProvider;
    }
}
