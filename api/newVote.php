<?php
session_start();
include_once("../lib/database.php");

if(isset($_GET["post_id"]) && isset($_GET["type"]) && $_GET["type"] <= 2 && $_GET["type"] >= 0){

}else{
    echo "Parameters error";
}

?>