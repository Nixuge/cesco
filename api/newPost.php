<?php
session_start();
include_once("../lib/database.php");
include_once("../config.php");

if (isset($_POST['postEditorTextArea']) && isset($_SESSION["userId"])) {
    if (strlen($_POST['postEditorTextArea']) >= 2 && strlen($_POST['postEditorTextArea']) <= MAX_POSTS_LENGTH){
        $db = new Database();

        $PostContent = $db->escapeStrings(htmlspecialchars($_POST['postEditorTextArea']));

        $userId = $_SESSION["userId"];

        $insertNewPostSqlPrompt = "INSERT INTO cesco_posts (content, USER_FK) VALUES ('$PostContent', '$userId')";

        $db->query($insertNewPostSqlPrompt);
        header('Location: ../index.php?p=home');
    } else {
    echo "error with post length";
    echo(strlen($_POST['postEditorTextArea']));
    echo("aaaa");
    echo MAX_POSTS_LENGTH;
    }
}

?>