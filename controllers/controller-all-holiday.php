<?php 
session_start();
include_once "../models/Worker.php";
$page_name = [];
$page_name["all-holiday"] = "selected-aside";
$connected = false;
if(!isset($_SESSION["id"])){
    $connected = false;
    header('Location: controller-connection.php');
    echo $_SESSION["id"];
}else{
    $connected = true;
}

if(!isset($_GET["day"]) || !isset($_GET["month"]) || !isset($_GET["year"]))
{
    header('Location: controller-home.php');
}

if($_SERVER["REQUEST_METHOD"] == "GET")
{
$worker_list = Worker::getAllWorker();
$day_in_month = cal_days_in_month(CAL_GREGORIAN, $_GET["month"], $_GET["year"]);
$currentDate = date("d-m-y");
$selected_date = $_GET["day"]."-".$_GET["month"]."-".$_GET["year"];
$prev_month = date('d-m-y', strtotime('-1 month', strtotime($selected_date)));
$next_month = date('d-m-y', strtotime('+1 month', strtotime($selected_date)));
$format = "d-m-y";
$date2  = \DateTime::createFromFormat($format, $currentDate);


}






include "../views/all-holiday.php";
?>