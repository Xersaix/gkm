<?php 
session_start();

include_once "../models/Expense.php";
include_once "../models/Worker.php";


$page_name = [];
$page_name["worker-list"] = "selected-aside";
$connected = false;
if(!isset($_SESSION["id"])){
    $connected = false;
    header('Location: controller-connection.php');
    echo $_SESSION["id"];
}else{
    $connected = true;
}
if(!isset($_GET["id"]))
{
    header('Location: controller-worker-list.php');
}

$date = "";
$dateRegex = '/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/'; 
$errors = [];
$fullday = 0;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $date = htmlspecialchars($_POST["date"]);
    if(empty($date))
    {
        $errors["date"] = "Champs obligatoire";
      
    }else if(!preg_match($dateRegex,$date))
    {
        $errors["date"] = "Date invalide";
    }
    else if($_POST["date"] > date("Y-m-d"))
    {
        $errors["date"] = "Date trop tard";

    }

    if(!isset($_POST["fullday"])){

        $fullday = 0;
    }
    else{
        $fullday = 1;
    }



    if(count($errors) == 0){

        Worker::addAbsence($_GET["id"],$fullday,$date);
        if($fullday){

            Worker::subtractHoliday($_GET["id"],1);
        }
        else{
            Worker::subtractHoliday($_GET["id"],0.5);
        }
        header('Location: controller-worker-list.php');
    }
}


include "../views/absence.php";
?>