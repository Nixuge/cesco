<?php
include_once("../lib/database.php");
include_once("../config.php");
session_start();


if (isset($_GET["post_id"]) && isset($_SESSION["userId"])){

    $db = new Database();

    $postId = $db->escapeStrings((int)$_GET["post_id"]);
    $userId = $_SESSION["userId"];
    $getGradeSqlQuery = "SELECT grade FROM cesco_users WHERE ID = '$userId'";
    $grade = $db->select($getGradeSqlQuery)[0]["grade"];

    if(in_array($grade, MODERATOR_GRADES)){
        $deletePostSqlQuery = "DELETE FROM cesco_posts WHERE ID = '$postId'";
        $db->query($deletePostSqlQuery);
        echo "C'est fait !";
    }else{
        echo "Stop HACKING please,,,<br>";

    }
}
?>