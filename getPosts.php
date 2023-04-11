
<?php
include_once("db.php");
define('JSON_CONTENT_TYPE', 'application/json; charset=utf-8');

function get_articles() {
    global $conn;
    $sql = 'SELECT a.content, a.title, a.ARTICLES_PK, a.USER_FK, a.dat, u.username
            FROM aj_articles a
            JOIN aj_Users u ON u.users_PK = a.USER_FK
            ORDER BY a.ARTICLES_PK DESC';
    $articles = $conn->query($sql);

    $postsData = [];

    while ($row = $articles->fetch_assoc()) {
        $postsData[] = $row;
    }


    return $postsData;
}

function get_comments() {
    global $conn;
    $sql = 'SELECT COMENT_PK, ARTICLE_FK, content, dat, USER_FK
            FROM aj_coments';
    $comments = $conn->query($sql);

    $commentData = [];

    while ($row = $comments->fetch_assoc()) {
        $commentData[] = $row;
    }

    return $commentData;
}

function get_likes() {
    global $conn;
    $sql = 'SELECT ARTICLE_FK, USER_FK, type
            FROM aj_reaction';
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
    include_once("db.php");

    global $conn;

    $articles = get_articles();
    $comments = get_comments();
    $likes = get_likes();

    $data = combine_comments_and_likes($articles, $comments, $likes);

    header('Content-Type: ' . JSON_CONTENT_TYPE);
    echo json_encode($data);
}

main();
?>
