<?php
session_start();
include_once("../lib/database.php");

if(isset($_GET["post_id"]) && isset($_GET["type"]) && $_GET["type"] <= 2 && $_GET["type"] >= 0 && is_int($_GET["post_id"]) && is_int($_GET["type"])){
    $db = new Database();
    $userId = $_SESSION["userId"];
    $voteType = $_GET["type"];
    $postId = $_GET["post_id"];

    $sqlQuery = "INSERT INTO cesco_votes (vote_type, USER_FK, POST_FK) VALUES ('$voteType', '$userId', '$postId')";
    
    $db->query($sqlQuery);
}else{
    echo "Parameters error";
}

?>