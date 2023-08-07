<?php
session_start();
include_once("../lib/database.php");

if(isset($_GET["post_id"]) && isset($_GET["type"]) && (int)$_GET["type"] <= 2 && (int)$_GET["type"] >= 0 ){
    if(isset($_SESSION["userId"])){
        $db = new Database();
        $userId = $db->escapeStrings($_SESSION["userId"]);
        $voteType = (int)$_GET["type"];
        $postId = (int)$_GET["post_id"];

        $sqlQuery = "INSERT INTO cesco_votes (vote_type, USER_FK, POST_FK) VALUES ('$voteType', '$userId', '$postId')";

        $db->query($sqlQuery);
    }else{
        header("location: index.php?p=signin");
    }
}else{
    echo "Parameters error";
}

?>