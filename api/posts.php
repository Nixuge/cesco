<?php

header('Content-Type: application/json; charset=utf-8');

include_once("../lib/database.php");

$db = new Database();

const getAllPostsSqlPrompt = "
SELECT cesco_posts.*, cesco_users.username AS author
FROM cesco_posts
JOIN cesco_users ON cesco_posts.USER_FK = cesco_users.ID
ORDER BY cesco_posts.ID DESC;
";

$data = $db->select(getAllPostsSqlPrompt);


echo(json_encode($data));
?>