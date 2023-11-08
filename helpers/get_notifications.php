<?php
include_once "../config.php";
include_once "../models/Worker.php";

session_start();

$newest_notif = Worker::get4NewNotif($_SESSION["id"]);

function get_time_ago( $time )
{
    $time_difference = time() - $time;

    if( $time_difference < 1 ) { return 'il ya moins de 1 seconde'; }
    $condition = array( 12 * 30 * 24 * 60 * 60 =>  'année',
                30 * 24 * 60 * 60       =>  'mois',
                24 * 60 * 60            =>  'jour',
                60 * 60                 =>  'heure',
                60                      =>  'minute',
                1                       =>  'seconde'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $time_difference / $secs;

        if( $d >= 1 )
        {
            $t = round( $d );
            return 'Il y a ' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) ;
        }
    }
}

foreach ($newest_notif as $notification) {
    echo '<div class="column  notif">';
    echo '<div class="columns  is-mobile">';
    echo '<div class="column is-2 is-mobile  is-flex is-justify-content-center is-align-items-center">';
    echo '<i class="' . $notification["icon"] . ' is-size-5 mx-3"></i>';
    echo '</div>';
    echo '<div class="column is-rest is-mobile">';
    echo '<p class="is-size-7 has-text-weight-bold mb-1">' . $notification["title"] . '</p>';
    echo '<p class="is-size-7 has-text-grey has-text-medium">' . $notification["text"] . '</p>';
    echo '<p class="is-size-7 mt-0 has-text-grey has-text-weight-light is-family-monospace">' . get_time_ago(strtotime($notification["date"]))  . '</p>';
    echo '</div>';
    echo '<i class="bi bi-x-circle close-notif mr-3 mt-2 is-size-6" data-notification-id="' . $notification["id"] . '"></i>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
?>
