<?php
session_start();

include_once("utils/database.php");
$db = new Database();

$post_id = $db->escapeStrings($_POST["post_id"]);
$reason = $db->escapeStrings($_POST["reason"]);
$userPK = $db->escapeStrings($_SESSION["userPk"]);

// Check if the post has already been reported by the same user
$checkReportSqlQuery = "SELECT * FROM cesco_reports WHERE POST_FK = '$post_id'";
$result = $db->query($checkReportSqlQuery);

if ($result->num_rows > 0) {
    // Update the 'count' column
    $updateCountSqlQuery = "UPDATE cesco_reports SET count = count + 1 WHERE POST_FK = '$post_id' AND REPORTER_FK = '$userPK'";
    $db->query($updateCountSqlQuery);
} else {
    // Insert a new report
    $insertReportSqlQuery = "INSERT INTO cesco_reports (POST_FK, REPORTER_FK, reason, count) VALUES ('$post_id', '$userPK', '$reason', 0)";
    $db->query($insertReportSqlQuery);
}
?>
