<?php
session_start();
include_once "../config.php";
include_once "../models/Worker.php";


    $notificationId = $_SESSION["id"];
    $number_notif =  Worker::getNotif($notificationId);
    $number_notif =  count($number_notif);


    // Convertissez $newest_notif en JSON pour renvoyer la réponse AJAX
    echo json_encode($number_notif);

?>