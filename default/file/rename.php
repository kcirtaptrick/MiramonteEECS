<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
    echo rename($_POST['old_path'], $_POST['new_path']);
?>