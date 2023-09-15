<!-- Aside overlay -->
<div class="aside-overlay" id="aside-overlay"></div>
<!-- Aside -->
<aside class="pb-5" id="aside-menu">
    <!-- In Aside top of the menu -->
    <div class="aside-top has-text-white">
        <div class="initial-avatar ml-5 mr-3"><p><?= $_SESSION["firstname"][0]?> <?= $_SESSION["lastname"][0]?></p></div>
        <p class="is-size-6 is-size-7-mobile"> <?= $_SESSION["firstname"]?> <?= $_SESSION["lastname"]?><br>Développeur Web</p>
    </div>



    <!-- Separation -->
    <p class="has-text-white ml-4 my-5">Compte employée</p>


    <div class="aside-link <?= $page_name["home"] ?? "" ?>">
        <a href="controller-home.php" class="is-size-7"><i class="bi bi-house mr-3 is-size-6"></i>Accueil</a>
    </div>
    <!-- Aside dropdown -->
    <div class="aside-dropdown ">
        <!-- Dropdown selectable content -->
        <span class="aside-dropdown-container <?= $page_name["expense"] ?? "" ?>">

            <p class="is-size-7"> <i class="bi bi-wallet2 mr-3 is-size-6"></i> Mes frais</p>
            <i class="bi bi-chevron-down"></i>
        </span>
        <!-- Dropdown content -->
        <span class="aside-dropdown-content">
            <div class="aside-link">
                <a href="controller-expense.php" class="is-size-7"><i class="bi bi-arrow-right mr-3"></i>Liste de dépense</a>
            </div>
            <div class="aside-link">
                <a href="" class="is-size-7"><i class="bi bi-arrow-right mr-3"></i>Ajouter une dépense</a>
            </div>
        </span>
    </div>
    <!-- End of the first Dropdown -->



    <div class="aside-link">
        <a href="" class="is-size-7"><i class="bi bi-calendar-event mr-3 is-size-6"></i>Mes Congées</a>
    </div>

    <div class="aside-link">
        <a href="" class="is-size-7"><i class="bi bi-files mr-3 is-size-6"></i>Fiche de paie</a>
    </div>

    <div class="aside-link">
        <a href="" class="is-size-7"><i class="bi bi-envelope mr-3 is-size-6"></i>Courrier</a>
    </div>


    <!-- Separation -->
    <p class="has-text-white ml-4 my-5">Secrétaire</p>

    <div class="aside-link">
        <a href="" class="is-size-7"><i class="bi bi-people-fill mr-3 is-size-6"></i>Liste des employées</a>
    </div>

    <div class="aside-link">
        <a href="" class="is-size-7"><i class="bi bi-plus-lg mr-3 is-size-6"></i>Ajouter un employée</a>
    </div>



    <p class="has-text-white ml-4 my-5">Rosalie</p>

    <div class="aside-link">
        <a href="" class="is-size-7"><i class="bi bi-calendar-event mr-3 is-size-6"></i>Mes Congées</a>
    </div>

    <div class="aside-link">
        <a href="" class="is-size-7"><i class="bi bi-files mr-3 is-size-6"></i>Mes documents</a>
    </div>

    <div class="aside-link">
        <a href="" class="is-size-7"><i class="bi bi-envelope-fill mr-3 is-size-6"></i>Courrier</a>
    </div>

    <div class="aside-link">
        <a href="" class="is-size-7"><i class="bi bi-bell mr-3 is-size-6"></i>Notification</a>
    </div>

</aside>