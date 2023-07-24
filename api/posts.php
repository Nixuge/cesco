<?php
include_once("lib/run_sql.php");

$db = new Database;
$data = $db.select("SELECT * FROM 'cesco_posts'");

echo $data;
?>