<?php

abstract class AbstractPagination
{
    public $pageSize;
    public $page;
    public $totalPages;
    public $items;
    public $outOfRange;
    public $isFirst;
    public $isLast;

    public function __construct($pageSize, $page, $queryInfo)
    {
        $this->pageSize = $pageSize;
        $this->page = $page;
        $this->handleQueryInfo($queryInfo);
        $this->totalPages = $this->getTotalPages();
        $this->items = $this->getItems();
        $this->outOfRange = ($page > $this->totalPages);
        $this->isFirst = ($page == 1);
        $this->isLast = ($page == $this->totalPages);
    }

    abstract protected function handleQueryInfo($queryInfo);

    abstract protected function getTotalPages();

    abstract protected function getItems();

    public function getPaginationResult($leftEdge=1, $leftCurrent=2, $rightCurrent=2, $rightEdge=1)
    {
        if($this->outOfRange)
            return null;

        $page = $this->page;
        $totalPages = $this->totalPages;

        if($page <= $leftEdge+$leftCurrent+1)
        {
            $leftEdgeRange = array();
            $leftCurrentRange = range(1, $page-1);
        }
        else
        {
            $leftEdgeRange = range(1, $leftEdge);
            $leftCurrentRange = range($page-$leftCurrent, $page-1);
        }

        if($page >= $totalPages-$rightEdge-$rightCurrent)
        {
            $rightEdgeRange = array();
            $rightCurrentRange = range($page+1, $totalPages);
        }
        else
        {
            $rightEdgeRange = range($totalPages-$rightEdge+1, $totalPages);
            $rightCurrentRange = range($page+1, $page+$rightCurrent);
        }

        return array(
            'leftEdgeRange' => $leftEdgeRange,
            'leftCurrentRange' => $leftCurrentRange,
            'rightCurrentRange' => $rightCurrentRange,
            'rightEdgeRange' => $rightEdgeRange,
        );
    }
}
