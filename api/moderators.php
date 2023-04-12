<?php
    define('JSON_CONTENT_TYPE', 'application/json');

    $moderators_pk = ["157", "150", "181", "183"];
    header('Content-Type: ' . JSON_CONTENT_TYPE);
    echo json_encode($moderators_pk);

?>
