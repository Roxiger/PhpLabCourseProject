<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "students".
 *
 * @property integer $student_id
 * @property integer $student_course_id
 * @property integer $student_speciality_id
 * @property string $student_fname
 * @property string $student_lname
 * @property string $student_email
 * @property integer $student_fnumber
 * @property string $student_education_form
 *
 * @property Specialities $studentSpeciality
 * @property Courses $studentCourse
 * @property StudentsAssessments[] $studentsAssessments
 * @property Subjects[] $saSubjects
 */
class Students extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_course_id', 'student_speciality_id', 'student_fname', 'student_lname','student_speciality_id','student_course_id', 'student_fnumber','student_email', 'student_education_form'], 'required'],
            [['student_course_id', 'student_speciality_id', 'student_fnumber'], 'integer'],
            [['student_education_form'], 'string'],
            [['student_fname', 'student_lname'], 'string', 'max' => 45],
            [['student_email'], 'string', 'max' => 64],
            [['student_email'], 'unique'],
            [['student_fname', 'student_lname', 'student_fnumber'], 'unique', 'targetAttribute' => ['student_fname', 'student_lname', 'student_fnumber'], 'message' => 'The combination of Student Fname, Student Lname and Student Fnumber has already been taken.'],
            [['student_speciality_id'], 'exist', 'skipOnError' => true, 'targetClass' => Specialities::className(), 'targetAttribute' => ['student_speciality_id' => 'speciality_id']],
            [['student_course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Courses::className(), 'targetAttribute' => ['student_course_id' => 'course_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'student_id' => 'Student ID',
            'student_course_id' => 'Курс',
            'student_speciality_id' => 'Специалност',
            'student_fname' => 'Име:',
            'student_lname' => 'Фамилия:',
            'student_email' => 'E-mail',
            'student_fnumber' => 'Факултетен номер:',
            'student_education_form' => 'Форма на обучение:',
        ];
    }

    /*
     * Sort merged rows
     */
    public function getPriority() 
    {
        return $this->student_fname . ' ' . $this->student_lname;
    }

    
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['user_name' => 'user_name']); 
    }

        /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentSpeciality()
    {
        return $this->hasOne(Specialities::className(), ['speciality_id' => 'student_speciality_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentCourse()
    {
        return $this->hasOne(Courses::className(), ['course_id' => 'student_course_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentsAssessments()
    {
        return $this->hasMany(StudentsAssessments::className(), ['sa_student_id' => 'student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaSubjects()
    {
        return $this->hasMany(Subjects::className(), ['subject_id' => 'sa_subject_id'])->viaTable('students_assessments', ['sa_student_id' => 'student_id']);
    }

    /**
     * @inheritdoc
     * @return StudentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StudentsQuery(get_called_class());
    }
    
}
