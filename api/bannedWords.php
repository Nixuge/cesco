<?php
    define('JSON_CONTENT_TYPE', 'application/json; charset=utf-8');
    $banned_words = array("connar", "pute", "fuck", "sex", "sexy", "connard", "fucke","foutre", "ta geul", "couille", "bite");
    header('Content-Type: ' . JSON_CONTENT_TYPE);
    echo json_encode($banned_words);
?>