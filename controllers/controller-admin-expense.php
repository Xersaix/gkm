<?php 
session_start();
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

if(isset($_GET["id"]))
{
    $list = Worker::getWorkerExpense($_GET["id"]);
    $text = "";
}

$errors = [];
$answer = null;

if($_SERVER["REQUEST_METHOD"] == "POST")
{

    if(isset($_POST["valid"]))
    {
        $answer = true;
    }

    if(isset($_POST["refuse"]))
    {
        if(isset($_POST["reason"]))
        {
            var_dump($_POST["reason"]);
            $text = htmlspecialchars($_POST["reason"]);  
        }

        if(empty($text))
        {
            $errors["refuse"] = "Réponse vide, veuillez donner une raison de refus";
            header('Location: controller-admin-expense.php?id='.$_GET["id"]);
        }
        else{
            $answer = false;
        }
    }

    if(count($errors) == 0)
    {

        if(isset($_POST["refuse"]) && $answer == false)
        {
            Worker::setExpenseState($_POST["refuse"],3);
            Worker::setExpenseDate($_POST["refuse"],date("Y-m-d"),$text);
            Worker::newNotif($_GET["id"],date('Y-m-d H:i:s'),"Frais","bi bi-x has-text-danger","Remboursement de frais refuser.");
            header('Location: controller-admin-expense.php?id='.$_GET["id"]);
        }else
        {
            Worker::setExpenseState($_POST["valid"],1);
            Worker::setExpenseDate($_POST["valid"],date("Y-m-d"),null);
            Worker::newNotif($_GET["id"],date('Y-m-d H:i:s'),"Frais","bi bi-check has-text-success","Remboursement de frais accepter.");
            header('Location: controller-admin-expense.php?id='.$_GET["id"]);
        }
    }
}


include "../views/admin-expense.php";
?>