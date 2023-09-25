<?php 
session_start();
include_once "../models/Worker.php";
$page_name = [];
$page_name["add-worker"] = "selected-aside";
$connected = false;
if(!isset($_SESSION["id"])){
    $connected = false;
    header('Location: controller-connection.php');
    echo $_SESSION["id"];
}else{
    $connected = true;
}
$lastname = "";
$firstname = "";

$email = "";
$password = "";
$password2 = "";
$regexPass = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/';
$regexName = '/^[a-zA-Z]+$/';
$errors = [];

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // firstname verification
    if(isset($_POST["lastname"]))
    {
        $lastname = htmlspecialchars($_POST["lastname"]);
        if(empty($lastname))
        {
            $errors["lastname"] = "Champs obligatoire !";
        }
        else if(!preg_match($regexName,$lastname))
        {
            $errors["lastname"] = "Mauvais format !";
        }

    }

    // lastname verification
    if(isset($_POST["firstname"]))
    {
        $firstname = htmlspecialchars($_POST["firstname"]);
        if(empty($firstname))
        {
            $errors["firstname"] = "Champs obligatoire !";
        }
        else if(!preg_match($regexName,$firstname))
        {
            $errors["firstname"] = "Mauvais format !";
        }

    }



    if(isset($_POST["email"]))
    {
        $email = htmlspecialchars($_POST["email"]);
        if(empty($email))
        {
            $errors["email"] = "Champs obligatoire !";
        }
        else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {

            $errors["email"] = "Mauvais format !";
        }
        else if(Worker::verifyEmail($email))
        {
            $errors["email"] = "Un utilisateur avec cette email existe deja !";
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
 Worker::addWorker($firstname,$lastname,$password,$email);
 header('Location: controller-worker-list.php');


}

}

include "../views/add-worker.php";
?>