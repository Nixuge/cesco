<?php
include_once("../lib/database.php");

if(isset($_POST['postEditorTextArea'])){
    $PostContent = $_POST['postEditorTextArea'];

    $db = new Database();

    $insertNewPostSqlPrompt = "INSERT INTO cesco_posts (content, USER_FK) VALUES ('$PostContent', 0)";

    if($db->query($insertNewPostSqlPrompt)){
        echo "sucess";
    }else{
        echo "error";
    }

}

?>