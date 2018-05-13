<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\StudentsAssessments;

/**
 * StudentsAssessmentsSearchs represents the model behind the search form about `app\models\StudentsAssessments`.
 */
class StudentsAssessmentsSearchs extends StudentsAssessments
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sa_id', 'sa_student_id', 'sa_subject_id', 'sa_workload_lectures', 'sa_workload_exercises', 'sa_assesment'], 'integer'],
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
        $query = StudentsAssessments::find();
        // add conditions that should always apply here
       // new code for widget linkpager
        $pageSize = isset($params['per-page']) ? intval($params['per-page']) : 10;
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' =>  ['pageSize' => $pageSize,],
        ]);
        $dataProvider->setSort([
            'attributes' => [

                'priority' => [
                    'asc' => ['saStudent.student_fname' => SORT_ASC],
                    'desc' => ['saStudent.student_fname' => SORT_DESC],
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
            'sa_id' => $this->sa_id,
            'sa_student_id' => $this->sa_student_id,
            'sa_subject_id' => $this->sa_subject_id,
            'sa_workload_lectures' => $this->sa_workload_lectures,
            'sa_workload_exercises' => $this->sa_workload_exercises,
            'sa_assesment' => $this->sa_assesment,
        ]);

        return $dataProvider;
    }
}
