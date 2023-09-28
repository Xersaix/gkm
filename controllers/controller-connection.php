<?php
session_start();
include_once "../models/Worker.php";
$connected = false;

if(!isset($_SESSION["id"]))
{
$connected = false;
}

$email = "";
$password = "";
$errors = [];

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Verify email existance
    if(isset($_POST["email"]))
    {
        $email = htmlspecialchars($_POST["email"]);
        if(empty($email))
        {
            $errors["email"] = "Champs obligatoire !" ;
        }
        else if(!worker::verifyEmail($email))
        {
            $errors["email"] = "Employer introuvable !" ; 
            
        }

    }

    // Verify password match to email
    if(isset($_POST["password"]))
    {
        $password = htmlspecialchars($_POST["password"]);
        if(empty($password))
        {
            $errors["password"] = "Champs obligatoire !";
        }
        else if(!isset($errors["email"]) )
        {
            if(!Worker::verifyPassLink($email,$password))
            {
                $errors["password"] = "Mot de passe incorrecte !";
            }

        }

    }

    // Verify error
    if(count($errors) == 0)
{
  $result =  Worker::getWorkerByEmail($email);
  $_SESSION["id"] = $result["id"];
  $_SESSION["id_account_type"] = $result["id_account_type"];
  $_SESSION["lastname"] = $result["lastname"];
  $_SESSION["firstname"] = $result["firstname"];
  $connected = true;
  Worker::newNotif($_SESSION["id"],date("Y-m-d"),"Connection","bi bi-person-check has-text-success","Nouvelle connection");
  header("Location: controller-home.php");

}

}

include "../views/connection.php";

?>