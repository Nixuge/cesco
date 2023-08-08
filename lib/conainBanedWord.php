<?php
include_once("../config.php");

function containBannedWord($sentence){
    foreach ($sentence as $word) {
        if (stripos($sentence, $word) !== false) {
            return true;
        }
    }
    return false;
}
?>