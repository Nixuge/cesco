<?php
header('Content-Type: application/json; charset=utf-8');

include_once("../lib/database.php");

$db = new Database();

if(!isset($_GET["id"])){
    $getAllPostsSql = "
    SELECT cesco_posts.*, cesco_users.username AS author, 
        IFNULL(SUM(cesco_votes.vote_type = 2), 0) AS votes_positives_count,
        IFNULL(SUM(cesco_votes.vote_type = 1), 0) AS votes_neutrals_count,
        IFNULL(SUM(cesco_votes.vote_type = 0), 0) AS votes_negatives_count
    FROM cesco_posts
    JOIN cesco_users ON cesco_posts.USER_FK = cesco_users.ID
    LEFT JOIN cesco_votes ON cesco_posts.ID = cesco_votes.POST_FK
    GROUP BY cesco_posts.ID
    ORDER BY cesco_posts.ID DESC;
    ";

    $data = $db->select($getAllPostsSql);

    echo json_encode($data);

}else{
    $postID = $db->escapeStrings($_GET["id"]);

    $getPostByIdSql = "
    SELECT cesco_posts.*, cesco_users.username AS author, 
        IFNULL(SUM(cesco_votes.vote_type = 2), 0) AS votes_positives_count,
        IFNULL(SUM(cesco_votes.vote_type = 1), 0) AS votes_neutrals_count,
        IFNULL(SUM(cesco_votes.vote_type = 0), 0) AS votes_negatives_count
    FROM cesco_posts
    JOIN cesco_users ON cesco_posts.USER_FK = cesco_users.ID
    LEFT JOIN cesco_votes ON cesco_posts.ID = cesco_votes.POST_FK
    WHERE cesco_posts.ID = '$postID'
    GROUP BY cesco_posts.ID;
    ";

    $params = array(":postID" => $postID);
    $postData = $db->select($getPostByIdSql, $params);

    if ($postData) {
        echo json_encode($postData);
    } else {
        $response = array("error" => "Post not found.");
        echo json_encode($response);
    }
}
?>
