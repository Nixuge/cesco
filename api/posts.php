<?php
include_once("../lib/database.php");

$db = new Database();
$data = $db->select("SELECT * FROM cesco_posts");

print_r(json_encode($data));
?>