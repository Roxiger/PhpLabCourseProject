<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "specialities".
 *
 * @property string $speciality_id
 * @property string $speciality_name_long
 * @property string $speciality_name_short
 *
 * @property Students[] $students
 */
class Specialities extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'specialities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['speciality_name_long', 'speciality_name_short'], 'required'],
            [['speciality_name_long'], 'string', 'max' => 255],
            [['speciality_name_short'], 'string', 'max' => 16],
            [['speciality_name_long'], 'unique'],
            [['speciality_name_short'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'speciality_id' => 'Специалност:',
            'speciality_name_long' => 'Пълно име',
            'speciality_name_short' => 'Абривиетура',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Students::className(), ['student_speciality_id' => 'speciality_id']);
    }
}
