<?php

class PostForm extends CFormModel
{
    public $title;
    public $content;

    public function rules()
    {
        return array(
            array('title', 'required', 'message' => 'You can\'t leave title empty.'),
            array('content', 'required', 'message' => 'You can\'t leave content empty.。'),
        );
    }
}
