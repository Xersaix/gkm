<?php
include_once "../config.php";
include_once "../models/Worker.php";

$newest_notif = Worker::get4NewNotif(1);

foreach ($newest_notif as $notification) {
    echo '<div class="column  notif">';
    echo '<div class="columns  is-mobile">';
    echo '<div class="column is-2 is-mobile  is-flex is-justify-content-center is-align-items-center">';
    echo '<i class="' . $notification["icon"] . ' is-size-5 mx-3"></i>';
    echo '</div>';
    echo '<div class="column is-rest is-mobile">';
    echo '<p class="is-size-7 has-text-weight-bold mb-1">' . $notification["title"] . '</p>';
    echo '<p class="is-size-7 has-text-grey has-text-weight-light">' . $notification["text"] . '</p>';
    echo '</div>';
    echo '<i class="bi bi-x-circle close-notif mr-3 mt-2 is-size-6" data-notification-id="' . $notification["id"] . '"></i>';
    echo '</div>';
    echo '</div>';
}
?>
