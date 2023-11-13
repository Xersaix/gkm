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
    $holiday = Worker::getHoliday($_POST["ok"]);

   if($holiday["FullDay"] == true )
   {
    Worker::subtractHoliday($holiday["ID_Worker"],1);
   }else if($holiday["FullDay"] == false )
   {
    Worker::subtractHoliday($holiday["ID_Worker"],0.5);
   }
   Worker::newNotif($holiday["ID_Worker"],date('Y-m-d H:i:s'),"Congé","bi bi-emoji-smile has-text-success","Un congé a été accepté.");
    header('Location: controller-all-holiday.php?day='.date("d").'&month='.date("m").'&year='.date("y"));
}
if(isset($_POST["no"]))
{
    Worker::setHolidayState($_POST["no"],3);
    header('Location: controller-all-holiday.php?day='.date("d").'&month='.date("m").'&year='.date("y"));
}


if(isset($_POST["deleteD"]) && isset($_POST["file-image"]) && isset($_POST["worker-id"]))
{

        $fileName = "../assets/img/uploads/file/".$_POST["worker-id"]."/".$_POST["file-image"];
    if(unlink($fileName))
    {

        Worker::deleteFile($_POST["deleteD"]);
        header('Location: controller-worker-list.php');
    }else{
    
        echo "cannot be deleted du to an error";

    }

}

if(isset($_POST["deleteP"]) && isset($_POST["file-image"]) && isset($_POST["worker-id"]))
{

        $fileName = "../assets/img/uploads/payslip/".$_POST["worker-id"]."/".$_POST["file-image"];
    if(unlink($fileName))
    {

        Worker::deleteFile($_POST["deleteP"]);
        header('Location: controller-worker-list.php');
    }else{
    
        echo "cannot be deleted du to an error";

    }

}

}
?>