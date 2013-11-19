<?php
 
class WebUser extends CWebUser
{
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
}