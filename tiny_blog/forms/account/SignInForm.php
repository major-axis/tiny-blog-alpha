<?php

class SignInForm extends CFormModel
{
    public $nickname;
    public $password;
    public $captcha;
    public $rememberMe;
	public $redirectTo;

    public function rules()
    {
        return array(
            array('nickname', 'required', 'message' => 'You can\'t leave nickname empty.'),
            array('password', 'required', 'message' => 'You can\'t leave password empty.'),
            array('captcha', 'captcha', 'captchaAction'=>'site/captcha', 'message' => Yii::app()->params['messages']['CAPTCHA_ERROR']),
            array('rememberMe', 'default', 'value' => false),
            array('rememberMe', 'boolean'),
        );
    }
}
