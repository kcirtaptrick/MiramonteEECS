<?php
if($_SERVER["REQUEST_METHOD"] = "POST" && $_POST['dir']) {
    treeView(root().$_POST['dir']);
}
function treeView($root) {
   
   echo '<li class="first" path="'.$root.'"><span>'. preg_replace("/.*\//", "", $root) .'</span><ul>';
   getTree($root);
   echo '</ul></li>'; 

   
}
function getTree($dir){
    $tree = scandir($dir);
    echo '<ul>';
    foreach($tree as $fileFolder){
        if($fileFolder != '.' && $fileFolder != '..'){
            if(!is_dir($dir.'/'.$fileFolder)){
                echo '<li path="'.$dir.'/'.$fileFolder.'">'.$fileFolder;
            } else {
                echo '<li path="'.$dir.'/'.$fileFolder.'"><span>'.$fileFolder.'</span>';
                getTree($dir.'/'.$fileFolder);
            }
            echo '</li>';
        }
    }
    echo '</ul>';
}
?>