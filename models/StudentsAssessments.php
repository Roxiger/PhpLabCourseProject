<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "students_assessments".
 *
 * @property string $sa_id
 * @property string $sa_student_id
 * @property string $sa_subject_id
 * @property integer $sa_workload_lectures
 * @property integer $sa_workload_exercises
 * @property integer $sa_assesment
 *
 * @property Subjects $saSubject
 * @property Students $saStudent
 * @property Subjects $subjects
 */
class StudentsAssessments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students_assessments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sa_student_id', 'sa_subject_id', 'sa_workload_lectures', 'sa_workload_exercises', 'sa_assesment'], 'required'],
            [['sa_student_id', 'sa_subject_id', 'sa_workload_lectures', 'sa_workload_exercises', 'sa_assesment'], 'integer'],
            [['sa_student_id', 'sa_subject_id'], 'unique', 'targetAttribute' => ['sa_student_id', 'sa_subject_id'], 'message' => 'The combination of Sa Student ID and Sa Subject ID has already been taken.'],
            [['sa_subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subjects::className(), 'targetAttribute' => ['sa_subject_id' => 'subject_id']],
            [['sa_student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Students::className(), 'targetAttribute' => ['sa_student_id' => 'student_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sa_id' => Yii::t('app', 'Sa ID'),
            'sa_student_id' => Yii::t('app', 'Име'),
            'sa_subject_id' => Yii::t('app', 'Дисциплина'),
            'sa_workload_lectures' => Yii::t('app', 'Хорариум(Л)'),
            'sa_workload_exercises' => Yii::t('app', 'Хорариум(У)'),
            'sa_assesment' => Yii::t('app', 'Оценка'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaSubject()
    {
        return $this->hasOne(Subjects::className(), ['subject_id' => 'sa_subject_id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaStudent()
    {
        return $this->hasOne(Students::className(), ['student_id' => 'sa_student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjects()
    {
        return $this->hasOne(Subjects::className(), ['subject_id' => 'sa_subject_id']);
    }

    /**
     * @inheritdoc
     * @return StudentsAssessmentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StudentsAssessmentsQuery(get_called_class());
    }
}
