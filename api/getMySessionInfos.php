<?php
session_start();
header('Content-Type: application/json');
$userId = $_SESSION["userId"];
$userName = $_SESSION["userName"];
$userGrade = $_SESSION["userGrade"];
$infoArray = ["userId"=>$userId, "userName"=>$userName, "userGrade"=>$userGrade];
echo json_encode($infoArray);
?>