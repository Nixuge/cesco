<?php
    function alert($msg){
        $escaped_msg = htmlspecialchars($msg, ENT_QUOTES, 'UTF-8');
        echo "<script>alert('$escaped_msg')</script>";
    }

?>