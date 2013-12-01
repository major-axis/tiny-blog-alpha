<?php
/**
 * Return the value of a form field in the incoming POST request
 *
 * Syntax:
 * {previous_value form='SignInForm' field='nickname'}
 * 
 * @param array $params
 * @param Smarty $smarty
 * @return string
 */
function smarty_function_previous_value($params, &$smarty)
{
    $formName = $params['form'];
    $fieldName = $params['field'];

    $form = Yii::app()->request->getPost($formName, array());
    return isset($form[$fieldName]) ? $form[$fieldName] : '';
}
