<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Specialities;

/**
 * SpecialitiesSearch represents the model behind the search form about `app\models\Specialities`.
 */
class SpecialitiesSearch extends Specialities
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['speciality_id'], 'integer'],
            [['speciality_name_long', 'speciality_name_short'], 'safe'],
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
    public function search($params)
    {
        $query = Specialities::find();

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
            'speciality_id' => $this->speciality_id,
        ]);

        $query->andFilterWhere(['like', 'speciality_name_long', $this->speciality_name_long])
            ->andFilterWhere(['like', 'speciality_name_short', $this->speciality_name_short]);

        return $dataProvider;
    }
}
