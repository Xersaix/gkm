<?php


include_once "../models/Worker.php";
$list = Worker::getAllWorker();


for ($i=0; $i <count($list) ; $i++) { 
    Worker::plusHoliday($list[$i]["id"],2.5);
}

?>