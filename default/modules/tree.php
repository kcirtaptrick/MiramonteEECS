<?php
if($_SERVER["REQUEST_METHOD"] = "POST" && $_POST['dir']) {
    treeView(root().$_POST['dir']);
}
function treeView($root, $showHidden = false) {
   
   echo '<li class="first" path="'.$root.'"><span>'. preg_replace("/.*\//", "", $root) .'</span><ul>';
   getTree($root, $showHidden);
   echo '</ul></li>'; 

   
}
function getTree($dir, $showHidden){
    $tree = scandir($dir);
    echo '<ul>';
    foreach($tree as $fileFolder){
        if($fileFolder != '.' && $fileFolder != '..'){
            if($fileFolder{0} != '.' || $showHidden) {
                if(!is_dir($dir.'/'.$fileFolder)){
                    echo '<li path="'.$dir.'/'.$fileFolder.'">'.$fileFolder;
                } else {
                    echo '<li path="'.$dir.'/'.$fileFolder.'"><span>'.$fileFolder.'</span>';
                    getTree($dir.'/'.$fileFolder, $showHidden);
                }
                echo '</li>';
            }
        }
    }
    echo '</ul>';
}
?>