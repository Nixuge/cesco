<?php

define('JSON_CONTENT_TYPE', 'application/json; charset=utf-8');

function get_articles($db) {
    $sql = 'SELECT a.content, a.title, a.ARTICLES_PK, a.USER_FK, a.dat, u.username
            FROM aj_articles a
            JOIN aj_Users u ON u.users_PK = a.USER_FK
            ORDER BY a.ARTICLES_PK DESC';
    $articles = $db->query($sql);

    $chatData = [];

    while ($row = $articles->fetch_assoc()) {
        $chatData[] = $row;
    }

    for ($i = 0; $i < count($chatData); $i++) {
        $sqlC = "SELECT username FROM aj_Users WHERE users_PK = " . $chatData[$i]["USER_FK"];
        $creator = $db->query($sqlC)->fetch_assoc()["username"];
        $chatData[$i]["creator"] = $creator;
    }

    return $chatData;
}

function get_comments($db) {
    $sql = 'SELECT COMENT_PK, ARTICLE_FK, content, dat, USER_FK
            FROM aj_coments';
    $comments = $db->query($sql);

    $commentData = [];

    while ($row = $comments->fetch_assoc()) {
        $commentData[] = $row;
    }

    return $commentData;
}

function get_likes($db) {
    $sql = 'SELECT ARTICLE_FK, USER_FK, type
            FROM aj_reaction';
    $likes = $db->query($sql);

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
    include_once("db.php");

    $db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    $articles = get_articles($db);
    $comments = get_comments($db);
    $likes = get_likes($db);

    $data = combine_comments_and_likes($articles, $comments, $likes);

    header('Content-Type: ' . JSON_CONTENT_TYPE);
    echo json_encode($data);
}

main();

?>
