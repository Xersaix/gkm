<!-- Navbar container -->
<nav class="my-navbar  pr-3">

    <div class="left-part-nav">
        <i class="bi bi-list is-size-3 mx-5 is-hidden-tablet" id="burger-button"></i>
    </div>
    <div class="right-part-nav">
        
        <i class="bi bi-bell is-size-4 mx-3"></i>
        <div class="initial-avatar-nav ml-3 mr-3"><p class="is-size-7"><?= $_SESSION["firstname"][0]?> <?= $_SESSION["lastname"][0]?></p></div>
    </div>


</nav>
<script src="../assets/js/navbar-aside.js"></script>