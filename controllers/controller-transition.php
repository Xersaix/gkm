<?php
session_start();
if(!isset($_SESSION["id"])){
    $connected = false;
    header('Location: controller-connection.php');
    echo $_SESSION["id"];
}else{
    $connected = true;
}
include_once "../models/Worker.php";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
if(isset($_POST["ok"]))
{
    Worker::setHolidayState($_POST["ok"],1);
    header('Location: controller-all-holiday.php?day='.date("d").'&month='.date("m").'&year='.date("y"));
}
if(isset($_POST["no"]))
{
    Worker::setHolidayState($_POST["no"],3);
    header('Location: controller-all-holiday.php?day='.date("d").'&month='.date("m").'&year='.date("y"));
}

}
?>