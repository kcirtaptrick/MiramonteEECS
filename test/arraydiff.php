<?php
function handleDiff($a, $b) {
    if($a===$b) {
        return 0;
    } 
    return ($a<$b)?1:-1;
}
var_dump(array_udiff(array("b", "a", "d", "c", "7"), array("a", "b", "c"), "handleDiff"));
var_dump(array_udiff(array("a", "b", "c"), array("b", "a", "d", "c", "7"), "handleDiff"));
?>