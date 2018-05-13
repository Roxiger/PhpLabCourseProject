<?php

namespace app\models;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $user_id;
    public $user_name;
    public $user_fname;
    public $user_lname;
    public $user_email;
    public $user_password;
    public $user_role;
    public $authKey;
    public $accessToken;

    //Използвам готовия class User от  Yii2 а не Users ot Gii
    
     public static function tableName() {
         return 'users';
     }
    
    /**
     * @inheritdoc
     */
    public static function findIdentity($user_id)
    {
//        $self = Users::find()-where(['user_id'=> $user_id])->one();
//        if(!count($self)){
//            return null;
//        }
//        
//        return new static($self);
        return static::findOne($user_id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $self = Users::find()
            ->where(["accessToken" => $token])
            ->one();
        if (!count($self)) {
            return null;
        }
        return new static($self);
    }

    /**
     * Finds user by user_name
     *
     * @param string $user_name
     * @return static|null
     */
    public static function findByUsername($user_name)
    {
    $self = Users::find()
            ->where([
                "user_name" => $user_name
            ])
            ->one();
    if (!count($self)) {
        return null;
    }
    return new static($self);
}

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->user_id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($user_password)
    {
        return $this->user_password === $user_password;
    }
}
