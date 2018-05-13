<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "courses".
 *
 * @property string $course_id
 * @property string $course_name
 *
 * @property Students[] $students
 */
class Courses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'courses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_name'], 'required'],
            [['course_name'], 'string', 'max' => 255],
            [['course_name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'course_id' => Yii::t('app', 'Course ID'),
            'course_name' => Yii::t('app', 'Име'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Students::className(), ['student_course_id' => 'course_id']);
    }

    /**
     * @inheritdoc
     * @return CoursesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CoursesQuery(get_called_class());
    }
}
