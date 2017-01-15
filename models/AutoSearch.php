<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Auto;

/**
 * AutoSearch represents the model behind the search form about `app\models\Auto`.
 */
class AutoSearch extends Auto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'year', 'mileage', 'image', 'user_id'], 'integer'],
            [['brand', 'model', 'modification'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
    public function search($params, $userId = false)
    {
        $query = Auto::find();

        // add conditions that should always apply here
        if ($userId) {
            $query->andFilterWhere(['user_id' => $userId]);
        }

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
            'year' => $this->year,
            'mileage' => $this->mileage
        ]);

        $query->andFilterWhere(['like', 'brand', $this->brand])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'modification', $this->modification]);

        return $dataProvider;
    }
}
