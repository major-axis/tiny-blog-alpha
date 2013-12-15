<?php

class MongoPagination extends AbstractPagination
{
    private $_model;
    private $_criteria;

    public function handleQueryInfo($queryInfo)
    {
        $this->_model = $queryInfo['model'];
        $this->_criteria = $queryInfo['criteria'];
    }

    private function getTotalPages()
    {
        return ceil($this->_model->count($this->_criteria) / $this->pageSize);
    }

    private function getItems()
    {
        return $this->_model->findAll($this->_criteria)->skip($this->pageSize * ($this->page - 1))->limit($this->pageSize);
    }
}
