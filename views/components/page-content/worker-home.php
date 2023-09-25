<div class="columns is-flex  is-flex-direction-row is-flex-wrap-wrap is-align-items-stretch">

    <div class="column is-5">
        <div class="columns is-flex  is-flex-direction-row  is-align-items-stretch is-flex-wrap-wrap">


            <!-- Total number of holiday -->
            <div class="column holiday-data is-5 p-5 mx-3 my-2 pb-0 has-background-white box">
                <div class="columns is-mobile ">
                    <div class="column is-8">
                        <p class="is-size-6 has-text-weight-bold has-text-grey">Congées</p>
                    </div>
                    <div class="column is-rest ">
                        <i class="bi bi-calendar-event "></i>
                    </div>
                </div>

                <div class="columns">
                    <div class="column p-0 pl-3 is-12">
                        <p class="is-size-3 "><?= $holiday_count["holiday_count"] ?></p>
                    </div>
                </div>
                <div class="columns py-0">
                    <div class="column is-12">
                        <p class="is-size-7 has-text-weight-light has-text-grey">Total des jours de congées</p>
                    </div>
                </div>


            </div>
            <!-- Holiday request of the month -->
            <div class="column holiday-data is-5 p-5 mx-3 my-2 pb-0 has-background-white box">
                <div class="columns is-mobile ">
                    <div class="column is-8">
                        <p class="is-size-6 has-text-weight-bold has-text-grey">Demande de Congée</p>
                    </div>
                    <div class="column is-rest ">
                        <i class="bi bi-calendar-week "></i>
                    </div>
                </div>

                <div class="columns">
                    <div class="column p-0 pl-3 is-12">
                        <p class="is-size-3 "><abbr title="Acceptée" class="has-text-success"><?= $holiday_number["Accepté"] ?></abbr> <abbr
                                title="En attente" class="has-text-warning"><?= $holiday_number["En_attente"] ?></abbr> <abbr title="Refusée"
                                class="has-text-danger"><?= $holiday_number["Refusé"] ?></abbr></p>
                    </div>
                </div>
                <div class="columns py-0">
                    <div class="column is-12">
                        <p class="is-size-7 has-text-weight-light has-text-grey">Congée du mois</p>
                    </div>
                </div>


            </div>


            <!-- Total number of holiday -->
            <div class="column holiday-data is-5 p-5 my-2 mx-3 pb-0 has-background-white box">
                <div class="columns is-mobile ">
                    <div class="column is-8">
                        <p class="is-size-6 has-text-weight-bold has-text-grey">Documents</p>
                    </div>
                    <div class="column is-rest ">
                        <i class="bi bi-file-earmark-text "></i>
                    </div>
                </div>

                <div class="columns">
                    <div class="column p-0 pl-3 is-12">
                        <p class="is-size-3 "><?= $file_number["total_files"] ?></p>
                    </div>
                </div>
                <div class="columns py-0">
                    <div class="column is-12">
                        <p class="is-size-7 has-text-weight-light has-text-grey">Non lu</p>
                    </div>
                </div>
            </div>

            <!-- Bill request of the month -->
            <div class="column holiday-data is-5 p-5 mx-3 my-2 pb-0 has-background-white box">
                <div class="columns is-mobile ">
                    <div class="column is-8">
                        <p class="is-size-6 has-text-weight-bold has-text-grey">Frais</p>
                    </div>
                    <div class="column is-rest ">
                        <i class="bi bi-wallet2 "></i>
                    </div>
                </div>

                <div class="columns">
                    <div class="column p-0 pl-3 is-12">
                        <p class="is-size-3 "><abbr title="Accepté" class="has-text-success"><?= $expense_number["Accepté"] ?></abbr> <abbr
                                title="En attente" class="has-text-warning"><?= $expense_number["En_attente"] ?></abbr> <abbr title="Refusé"
                                class="has-text-danger"><?= $expense_number["Refusé"] ?></abbr></p>
                    </div>
                </div>
                <div class="columns py-0">
                    <div class="column is-12">
                        <p class="is-size-7 has-text-weight-light has-text-grey">Remboursement du mois</p>
                    </div>
                </div>


            </div>



        </div>



    </div>

    <!-- Last file liste -->
    <div class="column file-list-box is-half ml-3 is-flex-shrink-2 mr-2 is-12-mobile box is-flex is-flex-direction-column is-justify-content-space-evenly is-align-items-center">

        <div class=" file-list">
            <p class="menu-label">
                Fiche de paie récente
            </p>
            <ul class="menu-list">
            <?php for ($i=0; $i < count($last_payslip) ; $i++) { ?>
                    <li><a data-fancybox data-caption="Document du <?= $last_payslip[$i]["date"] ?>" href="../assets/img/uploads/payslip/<?= $_SESSION["id"]?>/<?=$last_payslip[$i]["image"] ?>">Fiche de paie du <?= $last_payslip[$i]["date"] ?><span class="has-text-grey ml-5 has-text-weight-light"> Voir</span></a></li>
               <?php } ?>
            </ul>
        </div>
        <div class="  file-list">
            <p class="menu-label">
                Document récents
            </p>
            <ul class="menu-list"> 
                <?php for ($i=0; $i < count($last_file) ; $i++) { ?>
                    <li><a data-fancybox data-caption="Document du <?= $last_file[$i]["date"] ?>" href="../assets/img/uploads/file/<?= $_SESSION["id"]?>/<?=$last_file[$i]["image"] ?>">Document du <?= $last_file[$i]["date"] ?> <span class="has-text-grey ml-5 has-text-weight-light"> Voir</span></a> </li>
               <?php } ?>
            </ul>
        </div>
    </div>
    <script> Fancybox.bind("[data-fancybox]", {
  // Your custom options
});</script>