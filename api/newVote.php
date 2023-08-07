<?php
session_start();
include_once("../lib/database.php");

if(isset($_POST["post_id"]) && isset($_POST["type"]) && (int)$_POST["type"] <= 2 && (int)$_POST["type"] >= 0 ){
    if(isset($_SESSION["userId"])){
        $db = new Database();
        $userId = $db->escapeStrings($_SESSION["userId"]);
        $voteType = (int)$_POST["type"];
        $postId = (int)$_POST["post_id"];

        $verifyIfAlreadyLikedSqlQuery = "SELECT * FROM cesco_votes WHERE USER_FK = '$userId' AND POST_FK='$postId'";
        $verifyIfAlreadyLikedResult = $db->select($verifyIfAlreadyLikedSqlQuery);

        if(count($verifyIfAlreadyLikedResult) == 0){
            $insertVoteSqlQuery = "INSERT INTO cesco_votes (vote_type, USER_FK, POST_FK) VALUES ('$voteType', '$userId', '$postId')";
            $db->query($sqlQuery);
        }

    }else{
        header("location: ../index.php?p=signin");
    }
}else{
    echo "Parameters error";
}

?>