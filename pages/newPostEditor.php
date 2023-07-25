<?php
    if(!isset($_SESSION["userId"])){
        header("location: index.php?page=login");
    }
?>
<form action="api/newPost.php" method="post">
    <textarea name="postEditorTextArea" id="postEditorTextArea" cols="30" rows="10"></textarea>
    <button type="submit">PUBLISH TO THE INTERNET</button>
</form>