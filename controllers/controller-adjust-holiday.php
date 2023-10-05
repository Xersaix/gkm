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
$plus_minus = true;

$errors = [];
$number = 0;
$holiday_count = Worker::getWorkerHolidayCount($_GET["id"]);
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST["answer"]))
    {
       if($_POST["answer"] == "plus")
       {
        $plus_minus = true;
       }
       else if($_POST["answer"] == 'minus')
       {
        $plus_minus = false;
       }

    }else{
        $errors["choice"] = "Erreur";
    }

    if(isset($_POST["number"])){

        $number = +htmlspecialchars($_POST["number"]);
        if(empty($_POST["number"]))
        {
            $errors["number"] = "Champ obligatoire !";

        }else
        {
            if(!is_numeric($number))
            {
                $errors["number"] = "Veuillez entrer un chiffre";
            }

        }
        if($plus_minus == false && $holiday_count["holiday_count"] - $number < 0){
            $errors["number"] = "Nombre négatif";
        }
    }




if(count($errors) == 0)
{

    if($plus_minus)
    {
        Worker::plusHoliday($_GET["id"],$number);
        Worker::newNotif($_GET["id"],date('Y-m-d H:i:s'),"Congé","bi bi-plus has-text-info","Vos congés ont été ajustés: +".$number);

    }else if(!$plus_minus)
    {
        Worker::subtractHoliday($_GET["id"],$number);
        Worker::newNotif($_GET["id"],date('Y-m-d H:i:s'),"Congé","bi bi-dash has-text-danger","Vos congés ont été ajustés: -".$number);
    }
    header('Location: controller-worker-list.php');
}
}



include "../views/adjust-holiday.php";
?>