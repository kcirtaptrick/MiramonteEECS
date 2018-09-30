<?php
class Image {
    var $image, $type;
    function __construct($filename) {
        $this->load($filename);
    }
    function load($filename) {
        $this->type = getimagesize($filename)[2];
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
    
    function save($filename, $image_type = IMAGETYPE_JPEG, $compression = 75, $permissions = null) {
        switch ($image_type) {
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
    function output($image_type = IMAGETYPE_JPEG) {
        switch ($image_type) {
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
    function resize($width, $height) {
        $new_image = imagecreatetruecolor($width, $height);
        imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
        $this->image = $new_image;
    }
}
// $image = new Image('4ktest.jpg');
// $image->resizeToHeight(480);
// $image->output();
$imgs = scandir('thumbnails');
// print_r($imgs);
// echo '<img src="imgs/'.$imgs[2].'" height=480/>';
// $image = new Image('imgs/'.$imgs[2]);
// $image->resizeToHeight(480);
// $image->save('test.jpg');
for($i = 2; $i < count($imgs); $i++) {
    // echo 'imgs/'.$imgs[$i];
    // echo '<img src="imgs/'.$imgs[$i].'" height=150/>';
    
    // $img = new Image('imgs/'.$imgs[$i]);
    // $img->resizeToHeight(480);
    // $img->save('thumbnails/'.$imgs[$i]);
    echo '<img src="thumbnails/'.$imgs[$i].'" height=150/>';
}
?>