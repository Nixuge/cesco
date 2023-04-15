<?php
session_start();
if(isset($_SESSION["userPK"])){
    echo $_SESSION["userPK"];
}else{
    echo "0";
}
?>