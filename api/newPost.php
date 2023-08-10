<?php
session_start();
include_once("utils/database.php");
include_once("../config.php");

if (!isset($_POST['postEditorTextArea']) || !isset($_SESSION["userId"])) {
    return;
}

if (strlen($_POST['postEditorTextArea']) >= 2 && strlen($_POST['postEditorTextArea']) <= MAX_POSTS_LENGTH) {
    echo "error with post length";
    return;
}

$db = new Database();

$PostContent = $db->escapeStrings(htmlspecialchars($_POST['postEditorTextArea']));

$userId = $db->escapeStrings($_SESSION["userId"]);

$insertNewPostSqlPrompt = "INSERT INTO cesco_posts (content, USER_FK) VALUES ('$PostContent', '$userId')";

$db->query($insertNewPostSqlPrompt);
header('Location: ../index.php?p=home');