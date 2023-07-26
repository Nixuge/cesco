<?php
session_start();
include_once("../lib/database.php");
include_once("../lib/hash.php");
if (isset($_POST["username"])) {
    $db = new Database();

    $password = $_POST["password"];
    $username = $db->escapeStrings(htmlspecialchars($_POST["username"]));
    $hashedPassword = $db->escapeStrings(hashPassword($password));


    $getUserSqlPrompt = "SELECT * FROM cesco_users WHERE username = '$username' AND passwd = '$hashedPassword'";

    $usersResult = $db->select($getUserSqlPrompt);
    if (count($usersResult) >= 1) {
        $_SESSION['userName'] = $username;
        $_SESSION["userId"] = $usersResult[0]['ID'];
        header('Location: ../index.php?p=home');
    } else {
        $message = "Mot de passe ou nom d'utilisateur incorrect.";
        header('Location: ../index.php?p=signin&message=' . urlencode($message));
    }

}
?>