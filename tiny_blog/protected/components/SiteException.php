<?php

class SiteException extends Exception
{
    public $data;

    public function __construct($data = NULL, $code = 0)
    {
        $this->data = $data;
        parent::__construct(NULL, $code);
    }
}
