<?php 
session_start();

include_once "../models/Expense.php";
include_once "../models/Worker.php";


$page_name = [];
$page_name["payslip"] = "selected-aside";
$connected = false;
if(!isset($_SESSION["id"])){
    $connected = false;
    header('Location: controller-connection.php');
    echo $_SESSION["id"];
}else{
    $connected = true;
}



$list = Worker::getWorkerPayslip($_SESSION["id"]);

include "../views/payslip.php";
?>