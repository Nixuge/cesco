<?php
session_start();
header('Content-Type: application/json');
$userId = $_SESSION["userId"];
$userName = $_SESSION["userName"];
$userRank = $_SESSION["userRank"];
$infoArray = ["userId"=>$userId, "userName"=>$userName, "userRank"=>$userRank];
echo json_encode($infoArray);
?>