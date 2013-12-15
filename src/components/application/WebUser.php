<?php
 
class WebUser extends CWebUser
{
    public $loginRoute;
    public $redirectParamName;

    private $_model;

    protected function loadUser()
    {
        $this->_model=User::model()->findByPk($this->id);
    }

    public function getModel()
    {
        if(!$this->isGuest)
        {
            if($this->_model === NULL)
                $this->loadUser();
            return $this->_model;
        }
        else
            return NULL;
    }

    public function loginRequiredThenGoBack()
    {
        if($this->isGuest)
        {
            $url = Yii::app()->createUrl($this->loginRoute, array($this->redirectParamName => Yii::app()->getRequest()->getUrl()));
            Yii::app()->getRequest()->redirect($url);
        }
    }
}