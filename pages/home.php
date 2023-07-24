<?php
    $style = file_get_contents("style/post.css");
    include_once("components/post.php");
    echo post("Hello World", "JdM", "00.00.0000");
    echo post("Hello World", "JdM", "00.00.0000");
    echo "<style>{$style}</style>";
?>