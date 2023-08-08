<?php
// Start the session
session_start();

include_once("../lib/database.php");
include_once("../lib/hash.php");
include_once("../lib/containBannedWord.php");
include_once("../config.php");
if (isset($_POST["username"]) && !isset($_SESSION["userId"])) {
    $db = new Database();

    $password = $_POST["password"];
    $username = $db->escapeStrings(htmlspecialchars($_POST["username"]));
    $hashedPassword = $db->escapeStrings(hashPassword($password));
    print_r($BANNED_WORDS_USERNAMES);
    if(!containBannedWord($BANNED_WORDS_USERNAMES, $username)){
        $checkIfUsernameIsAlreadyTakenSqlQuery = "SELECT username FROM cesco_users WHERE username = '$username'";
        $existingUsernames = $db->select($checkIfUsernameIsAlreadyTakenSqlQuery);
    
        if(count($existingUsernames) <= 0){
    
            $insertNewUserSqlPrompt = "INSERT INTO cesco_users (username,passwd) VALUES ('$username','$hashedPassword')";
            $db->query($insertNewUserSqlPrompt);
        
            $getUserIdSqlPrompt = "SELECT * FROM cesco_users WHERE username = '$username' AND passwd = '$hashedPassword'";
            $userDbInfo = $db->select($getUserIdSqlPrompt);
        
            $userID = $userDbInfo[0]["ID"];
            $_SESSION['userID'] = $db->escapeStrings($userID);
            $_SESSION['userName'] = $db->escapeStrings(htmlspecialchars($username));
            header('Location: ../index.php?p=home');
        }else{
            $message = "Ce nom d'utilisateur est dêja pris, veuillez en utiliser un autre.";
            header('Location: ../index.php?p=signup&message=' . urlencode($message));
        }
    
    }else{
        $message = "Veulliez utiliser un autre nom d'utilisateur";
        header('Location: ../index.php?p=signup&message=' . urlencode($message));
    }



}
?>