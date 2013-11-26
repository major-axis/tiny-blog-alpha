<?php

class csrfField extends CWidget
{
    public function run()
    {
        $request=Yii::app()->request;
        echo $request->enableCsrfValidation ? CHtml::hiddenField($request->csrfTokenName, $request->getCsrfToken(), array('id'=>false)) : '';
    }
}
