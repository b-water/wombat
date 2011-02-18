<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of movies:
 *
 * @author nico
 */
class Movie {

    protected static $instance = null;
    private $movies = array();
    private $format = array();
    private $table = 'movie';
    private $genre = array();
    private $rating = array();

    private function __construct() {

        $registry = Registry::getInstance();
        $this->db = $registry->get('db');
    }

    private function __clone() {

    }

    public static function getInstance() {
        if (self::$instance == null)
            self::$instance = new movie();
        return self::$instance;
    }

    public function isModified($current, $new) {
        if(!empty($current) && !empty($new)) {
            
        }
    }

    public function update($values) {

        $fields = 'name, genre, format, size, description, cover, deleted';
        $cur_data = $this->fetch('*','id='.$_REQUEST['id'].'','','1');
        if(!empty($cur_data))
        {
            foreach($cur_data as $key => $val) {
                
            }
        }
//        echo 'id='.$_REQUEST['id'].'';

        var_dump($cur_data);

        
        if (isset($_FILES['cover']['name']) && !empty($_FILES['cover']['name'])) {
            var_dump($_FILES);
            $upload = new Zend_File_Transfer();
            $upload->addValidator('Count', false, array('min' => 1, 'max' => 1));
            $upload->addValidator('IsImage', false);
            $upload->addValidator('Size', false, array('max' => '2048kB'));

            /* get the file mimetype for the new name */
            $info = $upload->getFileInfo();
            $point = strpos($info['cover']['name'], '.');
            $ending = substr($info['cover']['name'], $point);
            $filename = 'upload/movie/cover/' . $_REQUEST['id'] . $ending;
            $upload->addFilter('Rename', $filename);

            if (!$upload->isValid()) {
                throw new Exception(implode(',', $upload->getMessages()));
            }

            /* upload the file */
            try {
                $upload->receive();
            } catch (Zend_File_Transfer_Exception $e) {
                throw new Exception($e->getMessage());
            }
        }

        $data = array (
            'name' => $values['name'],
            'genre' => $values['genre'],
            'format' => $values['format'],
            'size' => $values['size'],          
            'description' => $values['description']
        );

        if(isset($filename) && !empty($filename)) {
            $data['cover'] = $filename;
        }

        $affectedRows = $this->db->update($this->table,$data,'id="'.$_REQUEST['id'].'"');
        echo $affectedRows;
        if($affectedRows != 1) {
            throw new MovieException('The dataset coud not habe been updated!');
        }

    }

    public function delete($id) {

        $affectedRows = $this->db->delete($this->table, 'id="' . $id . '"');

        if ($affectedRows != 1) {
            throw new MovieException('The dataset coud not have been deleted!');
        }
    }

    /**
     * fetchs all formats that are set in the format table
     *
     * @return  array
     */
    public function getFormat() {

        $select = $this->db->select()->from('format', 'name')->where('type = "movie"')->order('name');
        $sql = $this->db->query($select);
        $result = $sql->fetchAll();

        foreach ($result as $item) {
            if (!empty($item)) {
                $this->format[] = $item;
            }
        }

        return $this->format;
    }

    /**
     * fetchs all ratings that are set in the rating table
     *
     * @return  array
     */
    public function getRating() {

        $select = $this->db->select()->from('rating', 'name')->where('type = "movie"')->order('name');
        $sql = $this->db->query($select);
        $result = $sql->fetchAll();

        foreach ($result as $item) {
            if (!empty($item)) {
                $this->rating[] = $item;
            }
        }

        return $this->rating;
    }

    /**
     * fetchs all genre types set in the genre table
     * 
     * @return  array
     */
    public function getGenre() {

        $select = $this->db->select()->from('genre', 'name')->where('type = "movie"')->order('name');
        $sql = $this->db->query($select);
        $result = $sql->fetchAll();

        foreach ($result as $item) {
            if (!empty($item)) {
                $this->genre[] = $item;
            }
        }

        return $this->genre;
    }

    /**
     * Gather Movies from Database
     *
     * @param   string  $fields
     * @param   string  $filter
     * @param   string  $orderby
     * @param   string  $limit
     * @return  array   movies
     */
    public function fetch($fields='*', $filter='', $orderby='name', $limit='', $offset='') {

        $select = $this->db->select();

        if (!empty($fields)) {
            $select->from($this->table, $fields);
        } else {
            $select->from($this->table);
        }

        if (!empty($filter)) {
            $select->where($filter);
        }

        $select->order($orderby);

        if (!empty($limit) && !empty($offset)) {
            $select->limit($limit, $offset);
        }

        $sql = $this->db->query($select);
        $result = $sql->fetchAll();

        foreach ($result as $item) {
            if (!empty($item)) {
                $this->movies[] = $item;
            }
        }

        return $this->movies;
    }

}

?>
