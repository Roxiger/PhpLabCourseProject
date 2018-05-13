<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subjects".
 *
 * @property integer $subject_id
 * @property string $subject_name
 * @property integer $subject_workload_lectures
 * @property integer $subject_workload_exercises
 *
 * @property StudentsAssessments[] $studentsAssessments
 * @property StudentsAssessments $subject
 */
class Subjects extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subjects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject_name', 'subject_workload_lectures', 'subject_workload_exercises'], 'required'],
            [['subject_workload_lectures', 'subject_workload_exercises'], 'integer'],
            [['subject_name'], 'string', 'max' => 45],
            [['subject_name'], 'unique'],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => StudentsAssessments::className(), 'targetAttribute' => ['subject_id' => 'sa_subject_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'subject_id' => 'Subject ID',
            'subject_name' => 'Име',
            'subject_workload_lectures' => 'Хорариум(Л)',
            'subject_workload_exercises' => 'Хорариум(У)',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentsAssessments()
    {
        return $this->hasMany(StudentsAssessments::className(), ['sa_subject_id' => 'subject_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaStudents()
    {
        return $this->hasMany(Students::className(), ['student_id' => 'sa_student_id'])->viaTable('students_assessments', ['sa_subject_id' => 'subject_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(StudentsAssessments::className(), ['sa_subject_id' => 'subject_id']);
    }

    /**
     * @inheritdoc
     * @return SubjectsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SubjectsQuery(get_called_class());
    }
}
