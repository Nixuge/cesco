<?php
include_once("../config.php");
header('Content-Type: application/json; charset=utf-8');

$data = array("max_posts_length" => MAX_POSTS_LENGTH);

echo json_encode($data);
?>