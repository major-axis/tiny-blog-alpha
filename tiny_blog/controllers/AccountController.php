<?php

class AccountController extends CController
{
    public $layout = false;

    private $_pageMessages;



    public function actionIndex()
    {
        $this->redirect(array('signin'));
    }

    public function actionSignInGet()
    {
        $this->render('signin', array(
            'redirectTo' => Yii::app()->request->getParam('redirectTo'),
            'ngApp' => 'tinyBlogApp',
            'messages' => $this->_pageMessages ? $this->_pageMessages : array(),
        ));
    }

    public function actionSignInPost()
    {
        try
        {
            $redirectTo = Yii::app()->request->getPost('redirectTo');
            $redirectTo = $redirectTo ? $redirectTo : Yii::app()->homeUrl;

            if(!isset($_POST['SignInForm']))
                throw new CHttpException(400, '');
            $form = new SignInForm;
            $form->attributes = $_POST['SignInForm'];
            if(!$form->validate())
                throw new SiteException(array('fields' => $form->errors));

            $incorrectNamePwdMsg = 'The nickname or password you entered is incorrect.';
            $user = User::model()->findByAttributes(array('nickname' => $form->nickname));
            if($user===null)
                throw new SiteException(array('errors' => array($incorrectNamePwdMsg)));
            if(!$user->validatePassword($form->password))
                throw new SiteException(array('errors' => array($incorrectNamePwdMsg)));
            $identity = new CUserIdentity($user->id, NULL);

            $duration = $form->rememberMe ? Yii::app()->params['rememberCookieDuration'] : 0;
            $webUser = Yii::app()->user;
            $webUser->login($identity, $duration);
            $this->redirect($redirectTo);
        }
        catch(SiteException $e)
        {
            $this->_pageMessages = $e->data;
            $this->actionSigninGet();
        }
    }

    public function actionSignOut()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }
}
