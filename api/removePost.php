<?php
include_once("../lib/isContributor.php");
session_start();


if (isset($_GET["post_id"]) && isset($_SESSION["userId"])){


    $postId = (int) $db->escapeStrings($_GET["post_id"]);
    $userId = (int) $db->escapeStrings($_SESSION["userId"]);



    if(isContributor($userId)){
        $deletePostSqlQuery = "DELETE FROM cesco_posts WHERE ID = '$postId'";
        $db->query($deletePostSqlQuery);
        echo "C'est fait !      <a href='../index.php?page=home'>HOME</a>";
    }else{
        echo "Stop HACKING please,,,<br>    <a href='https://www.youtube.com/watch?v=dQw4w9WgXcQ'>HOME</a>";

    }
}
?>