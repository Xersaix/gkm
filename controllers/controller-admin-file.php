<?php 
session_start();

include_once "../models/Expense.php";
include_once "../models/Worker.php";


$page_name = [];
$page_name["file"] = "selected-aside";
$connected = false;
if(!isset($_SESSION["id"])){
    $connected = false;
    header('Location: controller-connection.php');
    echo $_SESSION["id"];
}else{
    $connected = true;
}

$worker = Worker::getWorkerById($_GET["id"]);
$list2 = Worker::getWorkerPayslip($_GET["id"]);
$list = Worker::getWorkerFile($_GET["id"]);


include "../views/admin-file.php";
?>