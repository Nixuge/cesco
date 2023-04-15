<?php

session_start();
unset($_SESSION["user"]);
unset($_SESSION["userPK"]);


header('Location: ../index.php?page=home');

?>