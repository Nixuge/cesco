<?php


function containBannedWord($sentence){
    include_once("../config.php");
    foreach ($BANNED_WORDS_USERNAMES as $word) {
        if (stripos($sentence, $word) !== false) {
            return true;
        }
    }
    return false;
}
?>