<?php
include_once("../lib/database.php");

if(isset($_POST["username"])){
    $password = $_POST["password"];
    $username = $_POST["username"];

    $db = new Database();

    $insertNewUserSqlPrompt = "INSERT INTO cesco_users (username,password) VALUES ($username,$password)";

    if($db->query($insertNewUserSqlPrompt)){
        header('Location: ../index.php?p=home');
    }else{
        echo "An error occurred. Please try again later.";
    }
}
?>