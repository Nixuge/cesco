<?php

function isContributor(int $userId){
    include_once("../lib/database.php");
    include_once("../config.php");


    $db = new Database();

    $userIdEscaped = $db->escapeStrings($userId);
    $getGradeSqlQuery = "SELECT grade FROM cesco_users WHERE ID = '$userIdEscaped'";
    $grade = $db->select($getGradeSqlQuery)[0]["grade"];

    return in_array($grade, MODERATOR_GRADES);
}

?>