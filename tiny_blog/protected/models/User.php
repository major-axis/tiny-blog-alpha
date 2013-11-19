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

    public function relations()
    {
        return array(
            'posts' => array(self::HAS_MANY, 'Post', 'author_id'),
        );
    }

    public function hashPassword($password)
    {
        $this->password_hash = CPasswordHelper::hashPassword($password);
    }

    public function validatePassword($password)
    {
        return CPasswordHelper::verifyPassword($password, $this->password_hash);
    }
}
