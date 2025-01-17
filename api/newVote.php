<?php
session_start();
include_once("utils/database.php");

if (!(isset($_POST["post_id"]) && isset($_POST["type"]) && (int) $_POST["type"] <= 2 && (int) $_POST["type"] >= 0)) {
    echo "Parameters error";
    exit();
}
if (!isset($_SESSION["userId"])) {
    header("location: ../index.php?p=signin");
    exit();
}

$db = new Database();
$userId = $db->escapeStrings($_SESSION["userId"]);
$voteType = (int) $_POST["type"];
$postId = (int) $_POST["post_id"];

$verifyIfAlreadyLikedSqlQuery = "SELECT * FROM cesco_votes WHERE USER_FK = '$userId' AND POST_FK='$postId' AND vote_type = '$voteType'";
$verifyIfAlreadyLikedResult = $db->select($verifyIfAlreadyLikedSqlQuery);

// Add if not present, remove if already added
$voteActionSqlQuery = (count($verifyIfAlreadyLikedResult) == 0) ?
    "INSERT INTO cesco_votes (vote_type, USER_FK, POST_FK) VALUES ('$voteType', '$userId', '$postId')" :
    "DELETE FROM cesco_votes WHERE USER_FK = '$userId' AND POST_FK='$postId' AND vote_type = '$voteType'";

$db->query($voteActionSqlQuery);

?>