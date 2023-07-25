<?php
// Start the session
session_start();

include_once("../lib/database.php");
include_once("../lib/hash.php");

if(isset($_POST["username"])){
    $password = $_POST["password"];
    $username = $_POST["username"];
    $hashedPassword = hashPassword($password);
    $db = new Database();

    $insertNewUserSqlPrompt = "INSERT INTO cesco_users (username,passwd) VALUES ('$username','$hashedPassword')";
    $db->query($insertNewUserSqlPrompt);

    $getUserIdSqlPrompt = "SELECT * FROM cesco_users WHERE username = '$username' AND passwd = $hashedPassword";
    $userDbInfo = $db->select($getUserIdSqlPrompt);

    echo $userDbInfo[0]["ID"];
   // header('Location: ../index.php?p=home');

}
?>