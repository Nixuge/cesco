<?php

header('Content-Type: application/json; charset=utf-8');

include_once("../lib/database.php");

$db = new Database();

const getAllPostsSqlPrompt = "SELECT * FROM cesco_posts";

$data = $db->select(getAllPostsSqlPrompt);

print_r(json_encode($data));
?>