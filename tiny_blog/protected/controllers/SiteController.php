<?php

class SiteController extends CController
{
    public $layout = false;

    public function actions()
    {
        return array(
            'captcha' => array(
                'class' => 'CaptchaAction',
            )
        );
    }

    public function actionIndex()
    {
        $this->pageTitle = 'Index' . ' - ' . Yii::app()->params['title'];
        $this->render('index');
    }

    public function showError($code=NULL, $message=NULL)
    {
        $this->render('error', array(
            'code' => $code,
            'message' => $message,
        ));
    }

    public function actionError()
    {
        $error=Yii::app()->errorHandler->error;
        $this->showError($error['code'], $error['message']);
    }
}
