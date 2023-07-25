<?php
session_start();
include_once("../lib/database.php");

if(isset($_POST['postEditorTextArea']) && isset($_SESSION["userId"])){
    
    $db = new Database();

    $PostContent = $db->escapeStrings(htmlspecialchars($_POST['postEditorTextArea']));

    

    $insertNewPostSqlPrompt = "INSERT INTO cesco_posts (content, USER_FK) VALUES ('$PostContent', 0)";

    $db->query($insertNewPostSqlPrompt);
    header('Location: ../index.php?p=home');


}

?>