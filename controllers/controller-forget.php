<?php
session_start();
include_once "../models/Worker.php";
$connected = false;


if(!isset($_SESSION["id"]))
{
$connected = false;
}

$email = "";
$errors = [];
$send = false;

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
            $errors["email"] = "email introuvable !" ; 
            
        }

    }



    // Verify error
    if(count($errors) == 0)
{

    $expFormat = mktime(
        date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
        );
        $expDate = date("Y-m-d H:i:s",$expFormat);
        $key =  md5((2418 * 2) . $email);
        $addKey = substr(md5(uniqid(rand(),1)),3,10);
        $key = $key . $addKey;
        $dest=$email;
        $link = "http://gkmanagement.kmdev.fr/controllers/controller-reset.php?key=".$key.'&email='.$email."&action=reset";
        $objet="Mot de passe oublier";
         $message="
        Nous avons reçu une demande de réinitialisation de mot de passe pour votre compte GKManagement.\n
        Pour réinitialiser votre mot de passe, veuillez suivre les étapes ci-dessous :\n
        
        Cliquez sur le lien de réinitialisation ci-dessous : \n
         ".$link."\n
        
        Vous serez redirigé(e) vers une page sécurisée où vous pourrez créer un nouveau mot de passe.\n
        
        Suivez les instructions à l'écran pour choisir un nouveau mot de passe. Assurez-vous de choisir un mot de passe fort et sécurisé.\n
        
        Veuillez noter que ce lien de réinitialisation expirera dans [insérez ici la durée de validité, par exemple : 24 heures], donc assurez-vous de le compléter rapidement.\n
        
        Si vous n'avez pas demandé cette réinitialisation de mot de passe, veuillez ignorer ce message. Votre mot de passe actuel restera inchangé.\n
        ";
        $entetes="Cc: gkmanagement@kmdev.fr";
        
    mail($dest,$objet,utf8_decode($message),$entetes);
    $send = true;
    Worker::newForgot($email,$key,$expDate);
}

}

include "../views/forget.php";

?>