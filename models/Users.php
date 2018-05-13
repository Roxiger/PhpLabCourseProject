<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property string $user_id
 * @property string $user_name
 * @property string $user_fname
 * @property string $user_lname
 * @property string $user_email
 * @property string $user_password
 * @property string $user_role
 */
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_role','user_name','user_fname', 'user_lname','user_email','user_password'], 'required'],
            [['user_role'], 'string'],
            [['user_name'], 'string', 'max' => 30],
            [['user_fname', 'user_lname'], 'string', 'max' => 20],
            [['user_email'], 'string', 'max' => 64],
            [['user_password'], 'string', 'max' => 40],
            [['user_email'], 'unique'],
            [['user_name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_name' => 'Потребителско име:',
            'user_fname' => 'Собствено име:',
            'user_lname' => 'Фамилно име:',
            'user_email' => 'E-mail',
            'user_password' => 'User Password',
            'user_role' => 'Роля',
        ];
    }

    /**
     * @inheritdoc
     * @return UsersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsersQuery(get_called_class());
    }

    public function getAuthKey() {
        
    }

    public function getId() {
        
    }

    public function validateAuthKey($authKey) {

    }

    public static function findIdentity($user_id) {
        return static::findOne($user_id);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        
    }

}
