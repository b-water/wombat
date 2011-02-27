<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Thumbnail
 *
 * @author nico
 * @since 14:48:07
 */
class Thumbnail {

    //put your code here
    private $file = null;
    private $width = 256;
    private $height = null;
    private $type = null;
    private $size = null;

    public function setFile($filename) {
        if (isset($filename) && !empty($filename) && file_exists($filename)) {
            $this->file = $filename;
            $type_pos = strpos($this->file,'.');
            $this->type = substr($this->file, $type_pos+1);
        } else {
            throw new ThumbnailException('(#1) : File not set or File does not exist!');
        }
    }

    public function setDimensions($width, $height)
    {
        if(!empty($width) && !empty($height))
        {
            $this->width = $width;
            $this->height = $height;
        }
    }

    public function load() {
        
        switch ($this->type) {
            case 'jpg':
                $image = imagecreatefromjpeg($this->file);
                break;
            case 'png':
                $image = imagecreatefrompng($this->file);
                break;
            case 'gif':
                $image = imagecreatefromgif($this->file);
                break;
            default:
                throw new ThumbnailException('(#2) : Not-Supported Image Format!');
        }
    }

    public function calculate() {
        // Maximalausmaße
        
        // Ausmaße kopieren, wir gehen zuerst davon aus, dass das Bild schon Thumbnailgröße hat
        $thumbwidth = $imagewidth;
        $thumbheight = $imageheight;
        // Breite skalieren falls nötig
        if ($thumbwidth > $maxthumbwidth)
        {
            $factor = $maxthumbwidth / $thumbwidth;
            $thumbwidth *= $factor;
            $thumbheight *= $factor;
        }
        // Höhe skalieren, falls nötig
        if ($thumbheight > $maxthumbheight)
        {
            $factor = $maxthumbheight / $thumbheight;
            $thumbwidth *= $factor;
            $thumbheight *= $factor;
        }
        // Thumbnail erstellen
        $thumb = imagecreatetruecolor($thumbwidth, $thumbheight);
    }

}

?>
