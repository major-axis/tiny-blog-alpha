<?php

class MongoDatabase extends CApplicationComponent
{
    public $server;
    public $options;
    public $db;

    private $_mongo;
    private $_db;

    public function init()
    {
        parent::init();
        $this->_mongo = new MongoClient($this->server, $this->options);
        $this->_db = $this->_mongo->selectDB($this->db);
    }

    public function __get($name)
    {
        return $this->_db->selectCollection($name);
    }
}
