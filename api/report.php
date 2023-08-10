<?php
session_start();

include_once("utils/database.php");
$post_id = $_POST["post_id"];
$reason = $_POST["reason"];
$userPK = $_SESSION["userPk"];
$db = new Database();

$insertReportSqlQuery = "INSERT INTO cesco_reports (POST_FK, REPORTER_FK, reason) VALUES ('$post_id', '$userPk', '$reason')";
$db ->query($insertReportSqlQuery);


?>