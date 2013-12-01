<?php

class MonologJsonOutputWrapper extends CApplicationComponent
{
    public $level;
    public $logPath;
    public $logFile = 'events.log';

    private $_monolog;

    public function init()
    {
        parent::init();
        if(empty($this->logPath))
            $this->logPath = Yii::app()->getRuntimePath();
        $this->_monolog = new Monolog\Logger('info');
        $formatter = new Monolog\Formatter\LineFormatter();
        $handler = new Monolog\Handler\StreamHandler($this->logPath . '/' . $this->logFile, $this->level);
        $handler->setFormatter($formatter);
        $this->_monolog->pushHandler($handler);
    }

    public function toJson($info)
    {
        return $this->_monolog->addInfo(json_encode($info));
    }
}
