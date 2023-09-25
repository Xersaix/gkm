<?php 
session_start();
include_once "../models/Worker.php";
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

$last_file = Worker::getLastWorkerFile($_SESSION["id"]);
$last_payslip = Worker::getLastWorkerPayslip($_SESSION["id"]);
$holiday_number = Worker::getWorkerHolidayNumber($_SESSION["id"]);
$expense_number = Worker::getWorkerExpenseNumber($_SESSION["id"]);
$file_number = Worker::getWorkerFileNumber($_SESSION["id"]);
$holiday_count = Worker::getWorkerHolidayCount($_SESSION["id"]);

include "../views/home.php";
?>