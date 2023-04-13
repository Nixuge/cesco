<?php
    function isBadSentence($sentence)
    {
        $bannedWord = array("connard", "pute", "fuck", "sex", "sexy", "connard", "fuck","foutre", "ftg", "ta geul", "nique");

        for ($i=0; $i<count($bannedWord); $i++) {
            if(strpos($sentence, $bannedWord[$i]) !== FALSE){
                return TRUE;
            }
        }

    }

?>