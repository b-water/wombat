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
    private $db = array();
    private $config = array();

    public function __construct() {
        $registry = Registry::getInstance();
        $this->db = $registry->get('db');
        $this->config = $registry->get('config');
    }

    public function isModified($current, $new) {
        if(!empty($current) && !empty($new)) {
            
        }
    }

    public function update($values) {

        $data = array (
            'name' => $values['name'],
            'genre' => $values['genre'],
            'format' => $values['format'],
            'size' => $values['size'],
            'description' => $values['description']
        );

        if (isset($_FILES['cover']['name']) && !empty($_FILES['cover']['name'])) {

            // prepare upload
            $upload = new Zend_File_Transfer();
            $upload->addValidator('Count', false, array('min' => 1, 'max' => 1));
            $upload->addValidator('IsImage', false);
            $upload->addValidator('Size', false, array('max' => '6144kB'));

            /* get the file mimetype for the new name */
            $info = $upload->getFileInfo();
            $point = strpos($info['cover']['name'], '.');
            $ending = substr($info['cover']['name'], $point);
            $filename = 'upload/movie/cover/' . $_REQUEST['id'] . $ending;
            $upload->addFilter('Rename', $filename);

            // delete exisiting file
            if(file_exists($filename))
            {
                unlink($filename);
            }

            if (!$upload->isValid()) {
                throw new Exception(implode(',', $upload->getMessages()));
            }

            /* upload the file */
            try {
                $upload->receive();
            } catch (Zend_File_Transfer_Exception $zendFileTransferException) {
                die($zendFileTransferException);
            }

            $data['cover'] = $filename;

            // thumbnail erzeugen
            require_once('library/phpThumb/phpthumb.class.php');
            $thumb = new phpThumb();

            $thumb->setSourceFilename($filename);
            $thumb->setParameter('w', 100);
            $thumb->setParameter('h', 100);
            $thumb->setParameter('q', 60);
            $thumb->setParameter('config_output_format', $ending);
            $thumb->setParameter('config_allow_src_above_docroot', true);

            if ($thumb->GenerateThumbnail()) {
                if (!$thumb->RenderToFile('[Ausgabedatei]')) {
                    // Mach etwas mit dem Fehler
                    echo '<b>'.$thumb->fatalerror.'</b>';
                }
            }
        }


        $affectedRows = $this->db->update($this->table,$data,'id="'.$_REQUEST['id'].'"');
        
        if($affectedRows != 1) {
            throw new MovieException('(#1) : The dataset coud not habe been updated!');
        }

    }

    public function delete($id) {

        $affectedRows = $this->db->delete($this->table, 'id="' . $id . '"');

        if ($affectedRows != 1) {
            throw new MovieException('(#2) : The dataset coud not have been deleted!');
        }
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
