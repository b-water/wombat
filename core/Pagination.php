<?php

class Pagination {

    private $entriesPerPage;
    private $entriesMax;
    private $currentEntry;
    private $currentPage;
    private $pageRange;
    private $pageNumber;
    private $pagesInRange = array();
    private $previousText = 'Vorherige';
    private $nextText = 'Nächste';

    public function __construct($entriesPerPage = 10, $entriesMax = 0, $currentPage = 1, $pageRange = 5) {
        $this->entriesMax = $entriesMax;
        $this->entriesPerPage = $entriesPerPage;
        $this->currentPage = $currentPage;
        $this->pageRange = $pageRange;

        $this->currentEntry = ($this->currentPage - 1) * $this->entriesPerPage;
        // pages before current page
        
        for($i = $this->entriesPerPage;$i >= 1; $i--) {
            
        }
        for ($i = $currentPage; $i >= 1; $i--) {
            $this->pagesInRange[$i] = $i;
        }

        for ($i = $currentPage; $i >= 1; $i--) {
            $this->pagesInRange[$i] = $i;
        }
    }
    
    public function getEntriesPerPage() {
        return $this->entriesPerPage;
    }

    public function getCurrentEntry() {
        return $this->currentEntry;
    }

    public function getPagesInRange() {
        
    }

}

