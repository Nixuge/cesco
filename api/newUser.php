<?php
// Start the session
session_start();

include_once("../lib/database.php");
include_once("../lib/hash.php");

if (isset($_POST["username"]) && !isset($_SESSION["userId"])) {
    $db = new Database();

    $password = $_POST["password"];
    $username = $db->escapeStrings(htmlspecialchars($_POST["username"]));
    $hashedPassword = $db->escapeStrings(hashPassword($password));


    $insertNewUserSqlPrompt = "INSERT INTO cesco_users (username,passwd) VALUES ('$username','$hashedPassword')";
    $db->query($insertNewUserSqlPrompt);

    $getUserIdSqlPrompt = "SELECT * FROM cesco_users WHERE username = '$username' AND passwd = '$hashedPassword'";
    $userDbInfo = $db->select($getUserIdSqlPrompt);

    $userID = $userDbInfo[0]["ID"];
    $_SESSION['userID'] = $db->escapeStrings($userID);
    $_SESSION['userName'] = $db->escapeStrings(htmlspecialchars($username));
    header('Location: ../index.php?p=home');

}
?>