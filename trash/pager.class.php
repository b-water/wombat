<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pager
 *
 * @author nico
 */
class Pager {

    private $num_rows;
    private $current_page;
    private $limit;
    private $total_pages;
    private $the_pages = array();

    public function __construct($current_page, $num_rows, $limit) {
        $this->current_page = $current_page;
        $this->num_rows = $num_rows;
        $this->limit = $limit;
    }

    private function __clone() {

    }

    public function calculatePages() {
        // the total number of all pages
        $this->total_pages = ceil($this->num_rows / $this->limit);
    }

    public function setOffset() {
        // set the offset
        if ($this->current_page != '1') {
            $this->the_pages['offset'] = ($this->current_page - 1) * $this->limit;
        } else {
            $this->the_pages['offset'] = '0';
        }
    }

    public function setLimit() {
        // set the limit
        $this->the_pages['limit'] = $this->limit;
    }

    public function setFirst() {
        // create the first
        if ($this->current_page > '4') {
            $this->the_pages['pages']['1'] = '1';
            $this->the_pages['pages']['...'] = '...';
        }
    }

    public function createBackwardPages() {
        // creating the backward pages
        if (($this->current_page - 3) <= 0) {
            for ($index = '1'; $index <= $this->current_page; $index++) {
                $this->the_pages['pages'][$index] = $index;
            }
        } else {
            for ($index = ($this->current_page - 3); $index <= $this->current_page; $index++) {
                $this->the_pages['pages'][$index] = $index;
            }
        }
    }

    public function createForwardPages() {
        // creating the forward pages
        if ($this->current_page + 5 <= $this->total_pages) {
            for ($index = ($this->current_page + 1); $index <= ($this->current_page + 3); $index++) {
                $this->the_pages['pages'][$index] = $index;
            }
        } else {
            for ($index = ($this->current_page + 1); $index <= $this->total_pages; $index++) {
                $this->the_pages['pages'][$index] = $index;
            }
        }
    }

    public function setLast() {
        if ($this->current_page < $this->total_pages && ($this->current_page + 4) < $this->total_pages) {
            $this->the_pages['pages']['...2'] = '...';
            $this->the_pages['pages']['26'] = '26';
        }
    }

    public function craftPagebar() {
        if (!empty($this->num_rows) && !empty($this->limit) && $this->num_rows > $this->limit) {
            $this->calculatePages();
            $this->setFirst();
            $this->createForwardPages();
            $this->createBackwardPages();
            $this->setLast();

            // return the array with all informations about the pagination
            return $this->the_pages;
        }
    }

}

?>
