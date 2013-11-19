<?php

class CaptchaAction extends CCaptchaAction
{
    public function run()
    {
        $this->renderImage($this->getVerifyCode(true));
		Yii::app()->end();
    }
}