<?php
include_once "../config.php";
include_once "../models/Worker.php";

if (isset($_POST['id'])) {
    $notificationId = $_POST['id'];
    Worker::deleteNotif($notificationId);

    // Maintenant, récupérez les nouvelles notifications non lues
    $newest_notif = Worker::get4NewNotif($_SESSION["id"]);

    // Convertissez $newest_notif en JSON pour renvoyer la réponse AJAX
    echo json_encode($newest_notif);
} else {
    echo "ID de notification non spécifié.";
}
?>

