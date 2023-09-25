<?php 
session_start();

include_once "../models/Expense.php";
include_once "../models/Worker.php";


$page_name = [];
$page_name["holiday"] = "selected-aside";
$connected = false;
if(!isset($_SESSION["id"])){
    $connected = false;
    header('Location: controller-connection.php');
    echo $_SESSION["id"];
}else{
    $connected = true;
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
    else if($_POST["date"] <= date("Y-m-d"))
    {
        $errors["date"] = "Date trop tôt";

    }

    if(!isset($_POST["fullday"])){

        $fullday = 0;
    }
    else{
        $fullday = 1;
    }



    if(count($errors) == 0){

        Worker::addHoliday($_SESSION["id"],$fullday,$date);
        header('Location: controller-holiday.php?day='.date("d").'&month='.date("m").'&year='.date("y"));
    }
}


include "../views/new-holiday.php";
?>