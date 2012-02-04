<?php

/**
 * wombat
 * 
 * LICENCE
 * 
 * This work is licensed under the Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License. 
 * To view a copy of this license, visit http://creativecommons.org/licenses/by-nc-nd/3.0/ or send a letter to Creative Commons, 
 * 444 Castro Street, Suite 900, Mountain View, California, 94041, USA.
 * 
 * @name wombat
 * @author Nico Schmitz - nschmitz1991@gmail.com
 * @copyright  Copyright (c) 2010-2011 Nico Schmitz (nschmitz1991@gmail.com)
 * @license http://creativecommons.org/licenses/by-nc-nd/3.0/ Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License
 */
class Pagination {

    private $entriesPerPage;
    private $entriesMax;
    private $currentEntry;
    private $currentPage;
    private $pageRange;
    private $pageNumber;
    private $pages;
    private $pagesInRange = array();
    private $previousText = 'Vorherige';
    private $nextText = 'Nächste';
    private $optionBasicFields = array('entriesMax', 'currentPage', 'pageRange', 'entriesPerPage');
    private $optionAdditionFields = array('previousText', 'nextText');
    public $firstPage = 1;
    public $lastPage = 0;
    public $prevPage = 0;
    public $nextPage = 0;

    /**
     *
     * @param array $options
     * 
     * ------------Basic Options (that must be set-------------
     * 
     * entriesPerPage = maximum entries that are show on a page
     * entriesMax = the total amount of all entries
     * currentPage = the current page number
     * pageRange = how many pages should be shown
     * ------------Additional Options-------------------------
     * 
     * previousText = the text from the "previous" link
     * nextText = the text from the "next" link
     */
    public function __construct(array $options) {

        foreach ($this->optionBasicFields as $key => $val) {
            if (array_key_exists($val, $options) && !empty($options[$val])) {
                $this->$val = $options[$val];
            } else {
                return false;
            }
        }

        foreach ($this->optionAdditionFields as $key => $val) {
            if (array_key_exists($val, $options) && !empty($options[$val])) {
                $this->$val = $options[$val];
            }
        }


        // set the previous page
        if ($this->currentPage > 1) {
            $this->prevPage = $this->currentPage-1;
        }
        
        if($this->currentPage < $this->pages) {
            $this->nextPage = $this->currentPage+1;
        }

        // set the last page
            $this->lastPage = $this->pages;

        // calc the current entry
        $this->currentEntry = ($this->currentPage - 1) * $this->entriesPerPage;
        // calc all available pages
        $this->pages = ceil($this->entriesMax / $this->entriesPerPage);

        // build the pagination-range
        for ($i = $this->currentPage; $i >= 1 || $this->pageRange - $i == 0; $i--) {
            $this->pagesInRange[$i] = $i;
        }

        for ($i = $this->currentPage; $i <= $this->currentPage + $this->pageRange && $i < $this->pages; $i++) {
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
        return $this->pagesInRange;
    }

}

