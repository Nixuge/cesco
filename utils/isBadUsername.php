<?php
    function isBadUsername($sentence)
    {
        $bannedWord = array("connard", "pute", "fuck", "sex", "sexy", "connard", "fuck","foutre", "ftg", "ta geul", "nique", "cul", "merde", "couille", "bite", "hitler", "staline", "nazi", "debile", "débile", "con", "débil", "debil");

        for ($i=0; $i<count($bannedWord); $i++) {
            if(strpos(strtolower($sentence), $bannedWord[$i]) !== FALSE){
                return TRUE;
            }
        }

    }

?>