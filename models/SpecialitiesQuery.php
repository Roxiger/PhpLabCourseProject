<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Specialities]].
 *
 * @see Specialities
 */
class SpecialitiesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Specialities[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Specialities|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
