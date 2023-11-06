<?php 
session_start();
include_once "../models/Worker.php";
$page_name = [];
$page_name["user"] = "selected-aside";
$connected = false;
if(!isset($_SESSION["id"])){
    $connected = false;
    header('Location: controller-connection.php');
    echo $_SESSION["id"];
}else{
    $connected = true;
}

$worker = Worker::getWorkerById($_SESSION["id"]);


include "../views/user-info.php";
?>