<?php
include_once("../lib/isContributor.php");
session_start();


if (isset($_GET["post_id"]) && isset($_SESSION["userId"])){
    
    $db = new Database();
    $postId = $db->escapeStrings($_GET["post_id"]);
    $userId = $db->escapeStrings($_SESSION["userId"]);


    echo "aa";
    echo $userId;
    if(isContributor($userId)){
        echo "aaa";
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