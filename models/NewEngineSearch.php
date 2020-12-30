<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Engine;

/**
 * NewEngineSearch represents the model behind the search form of `app\models\Engine`.
 */
class NewEngineSearch extends Engine
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['start_time', 'stop_time', 'engine_type', 'type_start', 'work_time'], 'safe'],
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
        $query = Engine::find();

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
            'start_time' => $this->start_time,
            'stop_time' => $this->stop_time,
        ]);

        $query->andFilterWhere(['like', 'engine_type', $this->engine_type])
            ->andFilterWhere(['like', 'type_start', $this->type_start])
            ->andFilterWhere(['like', 'work_time', $this->work_time]);

        return $dataProvider;
    }
}
