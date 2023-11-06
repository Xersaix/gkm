<?php 
session_start();
include_once "../models/Worker.php";
$page_name = [];
$page_name["user"] = "selected-aside";
$connected = false;
if(!isset($_SESSION["id"])){
    $connected = false;
    header('Location: controller-connection.php');
    echo $_SESSION["id"];
}else{
    $connected = true;
}
$current_password = "";

$password = "";
$password2 = "";
$regexPass = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/';
$errors = [];
$worker = Worker::getWorkerById($_SESSION["id"]);

if($_SERVER["REQUEST_METHOD"] == "POST")
{


    if(isset($_POST["current-password"]))
    {
        $current_password = htmlspecialchars($_POST["current-password"]);

        if(empty($current_password)){

            $errors["current-password"] = "Champs obligatoire !";

        }
        else if (!preg_match($regexPass,$current_password))
        {
            $errors["current-password"] = "Le mot de passe doit contenir au minimum 8 charactère, 1 lettre et 1 chiffre !";
        }
        else if(!Worker::verifyPassLink($worker["email"],$current_password))
        {
            $errors["current-password"] = "Mot de passe incorrecte !";
        }
    }



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

    $password = password_hash($password,PASSWORD_DEFAULT);
    Worker::changePassword($password,$worker["email"]);
 header('Location: controller-user-info.php');


}

}

include "../views/new-pass.php";
?>