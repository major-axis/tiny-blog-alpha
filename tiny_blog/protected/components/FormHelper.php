<?php

class FormHelper
{
    /**
     * @return string get field value from the previous POST parameter.
     */
    public static function prevInput($formName, $fieldName)
    {
        $form = Yii::app()->request->getPost($formName, array());
        return isset($form[$fieldName]) ? $form[$fieldName] : '';
    }

    /**
     * @return string CSRF validation hidden input html.
     */
    public static function csrfField()
    {
        $request=Yii::app()->request;
        return $request->enableCsrfValidation ? CHtml::hiddenField($request->csrfTokenName, $request->getCsrfToken(), array('id'=>false)) : '';
    }
}
