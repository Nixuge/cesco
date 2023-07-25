<?php

header('Content-Type: application/json; charset=utf-8');

include_once("../lib/database.php");

$db = new Database();

const getAllPostsSqlPrompt = "SELECT * FROM cesco_posts ORDER BY ID desc";

$data = $db->select(getAllPostsSqlPrompt);

echo(json_encode($data));
?>