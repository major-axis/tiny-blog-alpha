<?php

class JsonResponse
{
    public static function processArray($arr)
    {
        header('Content-type: application/json');
        echo json_encode($arr);
        Yii::app()->end();
    }

    public static function processJson($str)
    {
        header('Content-type: application/json');
        echo $str;
        Yii::app()->end();
    }
}
