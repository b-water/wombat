<?php

/**
 * Description of Movie
 *
 * @author  Nico Schmitz - cofilew@gmail.com
 * @file    MovieController.php
 * @since   13.05.2011 - 23:35:14
 */
class Movie {

    protected static $instance = null;
    private $movies;
    private $format;
    private $table = 'movie';
    private $genre;
    private $rating;
    private $db;
    private $config;
    private $url;
    private $path = 'files/movie/';

    /**
     * 
     */
    public function __construct() {
        $registry = Registry::getInstance();
        $this->db = $registry->get('db');
        $this->config = $registry->get('config');
        $this->url = $registry->get('url');
    }

    public function isModified($current, $new) {
        if (!empty($current) && !empty($new)) {
            
        }
    }

    /**
     * Updates a Movie from the 
     * Movie Database and Uploads a 
     * Picture and generates a Thumbnail for it.
     *
     * @param array $values 
     */
    public function update($values) {

        $data = array(
            'name' => $values['name'],
            'genre' => $values['genre'],
            'format' => $values['format'],
            'size' => $values['size'],
            'rating' => $values['rating'],
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
            $filename = $this->path . $this->url->get('value') . $ending;
            $thumb_filename = $this->path . 'thumb/' . $this->url->get('value') . $ending;
            $upload->addFilter('Rename', $filename);

            // delete exisiting file
            if (file_exists($filename)) {
                unlink($filename);
                unlink($thumb_filename);
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

            // creating the thumbnail
            require_once('library/phpthumb/ThumbLib.inc.php');

            try {
                $thumb = PhpThumbFactory::create($filename);
            } catch (Exception $thumbnailException) {
                die($thumbnailException);
            }

            $thumb->adaptiveResize(230, 230)->cropFromCenter(230)->save($thumb_filename);

            $data['cover'] = $filename;
            $data['thumbnail'] = $thumb_filename;
        }

        $affectedRows = $this->db->update($this->table, $data, $this->url->get('key') . '="' . $this->url->get('value') . '"');
        if ($affectedRows != 1) {
            throw new MovieException('(#1) : The dataset coud not habe been updated!');
        }
    }

    /**
     * Deletes a Movie from the
     * Database and the Pictures according
     * to the Movie from files/movie/
     * 
     * @param type $id 
     */
    public function delete($id) {

        /* deleting files according to the movie */
        $path = 'files/movie/';
        $di = new DirectoryIterator($path);
        $length = strlen($id);
        foreach ($di as $file) {
            if (!$file->isDot() && substr($file->getFilename(), 0, $length) == $id) {
                $image = $path . $file->getFilename();
                $thumb = $path . 'thumb/' . $file->getFilename();
                if (file_exists($image)) {
                    unlink($image);
                }
                if (file_exists($thumb)) {
                    unlink($thumb);
                }
            }
        }
        /* deleting the movie from the database */
        $affectedRows = $this->db->delete($this->table, $this->url->get('key') . '="' . $id . '"');

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
        $this->movies = $sql->fetchAll();

        if (empty($this->movies))
            throw new MovieException('(#3) : No Movies found!');

        return $this->movies;
    }

}

?>
