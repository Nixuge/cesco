<?php
session_start();
include_once("../lib/database.php");

if(isset($_POST['postEditorTextArea']) && isset($_SESSION["userId"])){
    $PostContent = $db->escapeStrings($_POST['postEditorTextArea']);

    $db = new Database();

    $insertNewPostSqlPrompt = "INSERT INTO cesco_posts (content, USER_FK) VALUES ('$PostContent', 0)";

    $db->query($insertNewPostSqlPrompt);
    header('Location: ../index.php?p=home');


}

?>