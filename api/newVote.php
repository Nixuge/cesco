<?php
session_start();
include_once("../lib/database.php");

if(isset($_GET["post_id"]) && isset($_GET["type"]) && $_GET["type"] <= 2 && $_GET["type"] >= 0 && is_int($_GET["post_id"]) && is_int($_GET["type"])){
    if(isset($_SESSION["userId"])){
        $db = new Database();
        $userId = $db->escapeStrings($_SESSION["userId"]);
        $voteType = $_GET["type"];
        $postId = $_GET["post_id"];

        $sqlQuery = "INSERT INTO cesco_votes (vote_type, USER_FK, POST_FK) VALUES ('$voteType', '$userId', '$postId')";

        $db->query($sqlQuery);
    }else{
        header("location: index.php?p=signin");
    }
}else{
    echo "Parameters error";
}

?>