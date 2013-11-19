<?php

class SiteController extends CController
{
    public $layout = 'blank';

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

    public function actionError()
    {
        $this->pageTitle = 'Error' . ' - ' . Yii::app()->params['title'];
        $this->render('error', Yii::app()->errorHandler->error);
    }
}
