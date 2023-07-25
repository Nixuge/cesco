<?php
include_once("../lib/database.php");
include_once("../lib/hash.php");

if(isset($_POST["username"])){
    $password = $_POST["password"];
    $username = $_POST["username"];
    $hashedPassword = hashPassword($password)
    $db = new Database();

    $insertNewUserSqlPrompt = "INSERT INTO cesco_users (username,passwd) VALUES ('$username','$password')";
    hash("sha256")

    $dbResponse = $db->query($insertNewUserSqlPrompt);
    if($dbResponse == true){
        header('Location: ../index.php?p=home');
    }else{
        echo "An error occurred. Please try again later.";
        echo "<br>Error: ".$dbResponse;
    }
}
?>