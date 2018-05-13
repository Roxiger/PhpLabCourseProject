<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Students;

/**
 * StudentsSearch represents the model behind the search form about `app\models\Students`.
 */
class StudentsSearch extends Students
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id', 'student_course_id', 'student_speciality_id', 'student_fnumber'], 'integer'],
            [['student_fname', 'student_lname', 'student_email', 'student_education_form'], 'safe'],
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
        $query = Students::find();
        $query->select('*,(student_fname * student_lname) as priority');
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        //code for sorting merged roes
        $dataProvider->setSort([
            'attributes' => [
            'student_email',
            'student_fnumber',
                'priority' => [
                    'asc' => ['student_fname' => SORT_ASC,'student_lname' => SORT_ASC],
                    'desc' => ['student_fname' => SORT_DESC,'student_lname' => SORT_DESC],
                    'default' => SORT_ASC,
            ],
        ]
    ]); 

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'student_id' => $this->student_id,
            'student_course_id' => $this->student_course_id,
            'student_speciality_id' => $this->student_speciality_id,
            'student_fnumber' => $this->student_fnumber,
        ]);

        $query->andFilterWhere(['like', 'student_fname', $this->student_fname])
            ->andFilterWhere(['like', 'student_lname', $this->student_lname])
            ->andFilterWhere(['like', 'student_email', $this->student_email])
            ->andFilterWhere(['like', 'student_education_form', $this->student_education_form]);

        return $dataProvider;
    }
}
