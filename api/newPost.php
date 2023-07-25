<?php
include_once("../lib/database.php");

if(isset($_POST['postEditorTextArea'])){
    $PostContent = $_POST['postEditorTextArea'];

    $db = new Database();

    $insertNewPostSqlPrompt = "INSERT INTO cesco_posts (content, USER_FK) VALUES ('$PostContent', 0)";

    if($db->query($insertNewPostSqlPrompt)){
        header('Location: ../index.php?p=home');
    }else{
        echo "An error occurred. Please try again later.";
    }

}

?>