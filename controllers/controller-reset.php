<?php
session_start();
include_once "../models/Worker.php";
$connected = false;

if(!isset($_SESSION["id"]))
{
$connected = false;
}

$password = "";
$password2 = "";
$regexPass = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/';
$errors = [];
$invalid = false;
$changed = false;

if($_SERVER["REQUEST_METHOD"] == "GET")
{
    if(isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"]=="reset") && !isset($_POST["action"]))
    {
        $key = $_GET["key"];
        $email = $_GET["email"];
        $curDate = date("Y-m-d H:i:s");
        $resetKey = Worker::getResetKey($email,$key);
        $next_day = date("Y-m-d H:i:s", strtotime('+1 day', strtotime($resetKey["expDate"])));
        
        if($curDate > $next_day || empty($resetKey))
        {
        
          $invalid = true;  
        }
    }else{

        $invalid = true;
    }




}



if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST["password"]))
    {
        $password = htmlspecialchars($_POST["password"]);

        if(empty($password)){

            $errors["password"] = "Champs obligatoire !";

        }
        else if (!preg_match($regexPass,$password))
        {
            $errors["password"] = "Le mot de passe doit contenir au minimum 8 charactère, 1 lettre et 1 chiffre !";
        }
    }

    if(isset($_POST["password2"]))
    {
        $password2 = htmlspecialchars($_POST["password2"]);

        if(empty($password2)){

            $errors["password2"] = "Champs obligatoire !";

        }
        else if ($password2 != $password)
        {
            $errors["password2"] = "Les mot de pass doivent correspondre ! ";
        }
    }



    // Verify error
    if(count($errors) == 0)
{
    $mdp = password_hash($password,PASSWORD_DEFAULT);
    Worker::changePassword($mdp,$_GET["email"]);
    Worker::deleteKey($_GET["email"]);
    $changed = true;
}

}

include "../views/reset.php";

?>