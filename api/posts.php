
<?php

define('JSON_CONTENT_TYPE', 'application/json; charset=utf-8');

function get_articles($conn) {
    
    
    $sql = 'SELECT a.content, a.title, a.ARTICLES_PK, a.USER_FK, a.dat, u.username
            FROM aj_articles a
            JOIN aj_users u ON u.users_PK = a.USER_FK
            ORDER BY a.ARTICLES_PK DESC';

    $articles = $conn->query($sql);
    
    $postsData = [];

    while ($row = $articles->fetch_assoc()) {
        $postsData[] = $row;
    }


    return $postsData;
}

function get_comments($conn) {

    $sql = 'SELECT COMENT_PK, ARTICLE_FK, content, dat, USER_FK
            FROM aj_comments';
    $comments = $conn->query($sql);

    $commentData = [];

    while ($row = $comments->fetch_assoc()) {
        $commentData[] = $row;
    }

    return $commentData;
}

function get_likes($conn) {
 
    $sql = 'SELECT ARTICLE_FK, USER_FK, type
            FROM aj_reactions';
    $likes = $conn->query($sql);

    $likeData = [];

    while ($row = $likes->fetch_assoc()) {
        $likeData[] = $row;
    }

    return $likeData;
}

function combine_comments_and_likes($articles, $comments, $likes) {
    foreach ($articles as &$article) {
        $article['comments'] = [];
        $article['reaction'] = [];

        foreach ($comments as $comment) {
            if ($comment['ARTICLE_FK'] == $article['ARTICLES_PK']) {
                $article['comments'][] = $comment;
            }
        }

        foreach ($likes as $like) {
            if ($like['ARTICLE_FK'] == $article['ARTICLES_PK']) {
                $article['reaction'][] = $like;
            }
        }
    }

    return $articles;
}

function main() {
    
    error_reporting(E_ALL);
    include_once("../db.php");

   
    $articles = get_articles($conn);
    
    $comments = get_comments($conn);
    $likes = get_likes($conn);
    
    $data = combine_comments_and_likes($articles, $comments, $likes);
    header('Content-Type: ' . JSON_CONTENT_TYPE);
    echo json_encode($data);
}

main();
?>
