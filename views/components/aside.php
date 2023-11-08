<!-- Aside overlay -->
<div class="aside-overlay" id="aside-overlay"></div>
<!-- Aside -->
<aside class="pb-5" id="aside-menu">
    <!-- In Aside top of the menu -->
    <div class="aside-top has-text-white">
        <div class="initial-avatar ml-5 mr-5"><p><?= $_SESSION["firstname"][0]?> <?= $_SESSION["lastname"][0]?></p></div>
        <p class="is-size-6 is-size-7-mobile"> <?= $_SESSION["firstname"]?> <?= $_SESSION["lastname"]?></p>
    </div>



    <!-- Separation -->
    <p class="has-text-white ml-4 my-5">Compte employé</p>


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
                <a href="controller-new-expense.php" class="is-size-7"><i class="bi bi-arrow-right mr-3"></i>Ajouter une dépense</a>
            </div>
        </span>
    </div>
    <!-- End of the first Dropdown -->
        <!-- Aside dropdown -->
        <div class="aside-dropdown ">
        <!-- Dropdown selectable content -->
        <span class="aside-dropdown-container <?= $page_name["holiday"] ?? "" ?>">

            <p class="is-size-7"> <i class="bi bi-calendar-event mr-3 is-size-6"></i> Mes Congés</p>
            <i class="bi bi-chevron-down"></i>
        </span>
        <!-- Dropdown content -->
        <span class="aside-dropdown-content">
            <div class="aside-link">
                <a href="controller-holiday.php?day=<?= date("d")?>&month=<?= date("m")?>&year=<?= date("y")?>" class="is-size-7"><i class="bi bi-arrow-right mr-3"></i>Calendrier</a>
            </div>
            <div class="aside-link">
                <a href="controller-new-holiday.php" class="is-size-7"><i class="bi bi-arrow-right mr-3"></i>Prendre un congé</a>
            </div>
        </span>
    </div>
    <!-- End of the second Dropdown -->



    <div class="aside-link <?= $page_name["payslip"] ?? "" ?>">
        <a href="controller-payslip.php" class="is-size-7 "><i class="bi bi-files mr-3 is-size-6"></i>Fiche de paie</a>
    </div>

    <div class="aside-link <?= $page_name["file"] ?? "" ?>">
        <a href="controller-file.php" class="is-size-7"><i class="bi bi-file-earmark-text mr-3 is-size-6"></i>Documents</a>
    </div>
    <div class="aside-link <?= $page_name["user"] ?? "" ?>">
        <a href="controller-user-info.php" class="is-size-7"><i class="bi bi-person-vcard mr-3 is-size-6"></i>Informations personnelles</a>
    </div>

    <?php if($_SESSION["id_account_type"] != 3){ ?>
    <!-- Separation -->
    <p class="has-text-white ml-4 my-5">Compte secrétaire</p>

    <div class="aside-link <?= $page_name["worker-list"] ?? "" ?>">
        <a href="controller-worker-list.php" class="is-size-7"><i class="bi bi-people mr-3 is-size-6"></i>Liste des employés</a>
    </div>

    <div class="aside-link <?= $page_name["add-worker"] ?? "" ?>">
        <a href="controller-add-worker.php" class="is-size-7"><i class="bi bi-plus-lg mr-3 is-size-6"></i>Ajouter un employé</a>
    </div>
    
    <div class="aside-link <?= $page_name["all-holiday"] ?? "" ?>">
        <a href="controller-all-holiday.php?day=<?= date("d")?>&month=<?= date("m")?>&year=<?= date("y")?>" class="is-size-7"><i class="bi bi-calendar-event mr-3 is-size-6"></i>Congée des employés</a>
    </div>


    

    <?php } ?>
    <!-- Separation -->
    <?php if($_SESSION["id_account_type"] == 1){ ?>
    <p class="has-text-white ml-4 my-5">Compte administrateur</p>

    <!-- Aside dropdown -->
    <div class="aside-dropdown ">
        <!-- Dropdown selectable content -->
        <span class="aside-dropdown-container <?= $page_name["admin_file"] ?? "" ?>">

            <p class="is-size-7"> <i class="bi bi-file-earmark-text mr-3 is-size-6"></i>Document d'entreprise</p>
            <i class="bi bi-chevron-down"></i>
        </span>
        <!-- Dropdown content -->
        <span class="aside-dropdown-content">
            <div class="aside-link">
                <a href="controller-file-a.php" class="is-size-7"><i class="bi bi-arrow-right mr-3"></i>Documents</a>
            </div>
            <div class="aside-link">
                <a href="controller-add-file-a.php" class="is-size-7"><i class="bi bi-arrow-right mr-3"></i>Ajouter un document</a>
            </div>
        </span>
    </div>
    <!-- End of the first Dropdown -->


    <?php } ?>
    <div class="aside-link">
        <a href="controller-disconnect.php" class="is-size-6"><i class="bi bi-box-arrow-right my-5 mr-3 is-size-6"></i>Se déconnecter</a>
    </div>

</aside>