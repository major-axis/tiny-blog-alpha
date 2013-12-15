<?php

class User extends CActiveRecord
{
    /**
     * columns in table 'users':
     * @var integer $id
     * @var string $nickname
     * @var string $password_hash
     * @var string $email
     */

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'users';
    }

    public function hashPassword($password)
    {
        $this->password_hash = PHPassLib\Hash\PBKDF2::hash($password, Yii::app()->params['passwordHashPbkdf2Config']);
    }

    public function validatePassword($password)
    {
        return PHPassLib\Hash\PBKDF2::verify($password, $this->password_hash);
    }
}
