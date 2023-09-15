<?php 
session_start();

include_once "../models/Expense.php";
include_once "../models/Worker.php";


$page_name = [];
$page_name["expense"] = "selected-aside";
$connected = false;
if(!isset($_SESSION["id"])){
    $connected = false;
    header('Location: controller-connection.php');
    echo $_SESSION["id"];
}else{
    $connected = true;
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{

    if(isset($_POST["delete"]))
    {
        Expense::deleteExpense($_POST["delete"]) ;
        header("Location: controller-expense.php");
    }
}

$list = Worker::getWorkerExpense($_SESSION["id"]);

include "../views/expense.php";
?>