<?php
$newest_notif = Worker::get4NewNotif($_SESSION["id"]);


?>


<!-- Navbar container -->
<nav class="my-navbar pr-3 ">

    <div class="left-part-nav">
        <i class="bi bi-list is-size-3 mx-5 hidden-dekstop" id="burger-button"></i>
    </div>
    <div class="right-part-nav">

        <div class="dropdown"><i class="bi bi-bell is-clickable is-size-4 mx-3">
            <div class="icon-number is-flex is-justify-content-center is-align-items-center">
            <p class="is-size-7 has-text-white" id="number-notif"></p>
            </div>
                <div class="dropdown-content is-justify-content-center m-0 p-0 ">
                    <div class="columns is-flex is-flex-direction-column m-0 p-0">
                        <!-- Text of new notification -->
                        <div class="column is-flex is-justify-content-center">
                            <p class="has-text-weight-bold has-text-centered my-1 is-size-7" id="number-notif2"></p>
                        </div>
                        <!-- Notification -->

                        <div id="notifications-container">

                        <!-- En of notification -->
                        </div>
                    </div>
                </div>
        </div></i>
        <div class="initial-avatar-nav ml-3 mr-3">
            <p class="is-size-7">
                <?= $_SESSION["firstname"][0]?>
                <?= $_SESSION["lastname"][0]?>
            </p>
        </div>
    </div>


</nav>
<script src="../assets/js/navbar-aside.js"></script>
<script src="../assets/js/notif.js"></script>