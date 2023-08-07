<?php
header('Content-Type: application/json; charset=utf-8');

include_once("../lib/database.php");

$db = new Database();

const getAllPostsSql = "
SELECT cesco_posts.*, cesco_users.username AS author, 
    SUM(cesco_votes.vote_type = 2) AS votes_positives_count,
    SUM(cesco_votes.vote_type = 1) AS votes_neutrals_count,
    SUM(cesco_votes.vote_type = 0) AS votes_negatives_count
FROM cesco_posts
JOIN cesco_users ON cesco_posts.USER_FK = cesco_users.ID
LEFT JOIN cesco_votes ON cesco_posts.ID = cesco_votes.POST_FK
GROUP BY cesco_posts.ID
ORDER BY cesco_posts.ID DESC;
";

$data = $db->select(getAllPostsSql);

echo json_encode($data);
?>
