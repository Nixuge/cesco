<?php

function containBannedWord($bannedWords, $sentence){

    foreach ($bannedWords as $word) {
        if (stripos($sentence, $word) !== false) {
            return true;
        }
    }
    return false;
}
?>