<?php 
session_start();
$page_name = [];
$page_name["home"] = "selected-aside";
$connected = false;
if(!isset($_SESSION["id"])){
    $connected = false;
    header('Location: controller-connection.php');
    echo $_SESSION["id"];
}else{
    $connected = true;
}

$selected_date = [];

$days = date("t");

include "../views/holiday.php";
?>