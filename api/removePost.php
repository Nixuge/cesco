<?php
include_once("../config.php");
session_start();
include_once("../lib/database.php");

if (isset($_GET["post_id"]) && isset($_SESSION["userId"])){
    
    $db = new Database();
    $postId = $db->escapeStrings($_GET["post_id"]);
    $userId = $_SESSION["userId"];
    $userRank = $_SESSION["userRank"];


    if(in_array($userRank, MODERATOR_GRADES)){
        $deletePostSqlQuery = "DELETE FROM cesco_posts WHERE ID = '$postId'";
        $db->query($deletePostSqlQuery);
        echo "C'est fait !      <a href='../index.php?page=home'>HOME</a>";
    }else{
        echo "Stop HACKING please,,,<br>    <a href='https://www.youtube.com/watch?v=dQw4w9WgXcQ'>MORE INFORMATION</a>";

    }
}else{
    echo "Stop HACKING please,,,<br>    <a href='https://www.youtube.com/watch?v=dQw4w9WgXcQ'>MORE INFORMATION</a>";
}
?>