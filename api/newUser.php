<?php
include_once("../lib/database.php");

if(isset($_POST["username"])){
    $password = $_POST["password"];
    $username = $_POST["username"];

    $db = new Database();

    $insertNewUserSqlPrompt = "INSERT INTO cesco_users (username,passwd) VALUES ($username,$password)";

    $dbResponse = $db->query($insertNewUserSqlPrompt);
    if($dbResponse){
        header('Location: ../index.php?p=home');
    }else{
        echo "An error occurred. Please try again later.";
        echo "Error".$dbResponse;
    }
}
?>