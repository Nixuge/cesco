<?php
    function isModerator($userPk){
        $moderators_pk = ["157", "150", "181", "183"];
        return  in_array($userPk, $moderators_pk);
    }
?>