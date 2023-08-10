<?php
session_start();

include_once("utils/database.php");
$post_id = $db ->escapeStrings($_POST["post_id"]);
$reason = $db ->escapeStrings($_POST["reason"]);
$userPK = $db ->escapeStrings($_SESSION["userPk"]);
$db = new Database();

$insertReportSqlQuery = "INSERT INTO cesco_reports (POST_FK, REPORTER_FK, reason) VALUES ('$post_id', '$userPk', '$reason')";
$db ->query($insertReportSqlQuery);


?>