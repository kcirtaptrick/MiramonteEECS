<?php
class Image {
    var $image, $type;
    function __construct($filename) {
        $this->load($filename);
    }
    function load($filename) {
        $this->type = getimagesize($filename) [2];
        switch ($this->type) {
            case IMAGETYPE_JPEG:
                $this->image = imagecreatefromjpeg($filename);
            break;
            case IMAGETYPE_PNG:
                $this->image = imagecreatefrompng($filename);
            break;
            case IMAGETYPE_GIF:
                $this->image = imagecreatefromgif($filename);
            break;
        }
    }
    function save($filename, $type = IMAGETYPE_JPEG, $compression = 75, $permissions = null) {
        switch ($type) {
            case IMAGETYPE_JPEG:
                imagejpeg($this->image, $filename, $compression);
            break;
            case IMAGETYPE_PNG:
                imagegif($this->image, $filename);
            break;
            case IMAGETYPE_GIF:
                imagepng($this->image, $filename);
            break;
        }
        if ($permissions != null) {
            chmod($filename, $permissions);
        }
    }
    function output($type = IMAGETYPE_JPEG) {
        switch ($type) {
            case IMAGETYPE_JPEG:
                header('Content-Type: image/jpeg');
                imagejpeg($this->image);
            break;
            case IMAGETYPE_PNG:
                header('Content-Type: image/png');
                imagegif($this->image);
            break;
            case IMAGETYPE_GIF:
                header('Content-Type: image/gif');
                imagepng($this->image);
            break;
        }
    }
    function getWidth() {
        return imagesx($this->image);
    }
    function getHeight() {
        return imagesy($this->image);
    }
    function resizeToHeight($height) {
        $this->resize($this->getWidth() * $height / $this->getHeight(), $height);
    }
    function resizeToWidth($width) {
        $this->resize($width, $this->getHeight() * $width / $this->getWidth());
    }
    function resize($width, $height) {
        $new_image = imagecreatetruecolor($width, $height);
        imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
        $this->image = $new_image;
    }
    function scale($scale) {
        $this->resize($this->getWidth() * $this->getHeight() * $scale / 100);
    }
}
function filterImgs($filename) {
    return preg_match('/.*(.png|.jpg|.jpeg|.gif)/i', $filename);
}
function updateThumbnails($raw_img_dir, $thumb_dir, $thumb_res = 480) {
    $raw_files = array_filter(scandir($raw_img_dir), "filterImgs");
    $thumb_files = array_filter(scandir($thumb_dir), "filterImgs");
    $adds = array_diff($raw_files, $thumb_files);
    foreach ($adds as $add) {
        try {
            $img = new Image($raw_img_dir . '/' . $add);
            $img->resizeToHeight($thumb_res);
            $img->save($thumb_dir . '/' . $add);
        } catch (Exception $e) {}
    }
    $dels = array_diff($thumb_files, $raw_files);
    foreach ($dels as $del) {
        unlink($thumb_dir . '/' . $del);
    }
}
updateThumbnails('imgs', 'thumbnails');
?>