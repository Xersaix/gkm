<div class="columns  is-flex  is-flex-direction-row is-flex-wrap-wrap is-align-items-stretch">

    <div class="column is-5 is-12-touch">
        <div class="columns  is-flex  is-flex-direction-row  is-align-items-stretch is-flex-wrap-wrap">


            <!-- Total number of holiday -->
            <div class="column holiday-data is-5 p-5 mx-3 my-2 pb-0 has-background-white box">
                <div class="columns is-mobile ">
                    <div class="column is-8">
                        <p class="is-size-6 has-text-weight-bold has-text-grey">Congés</p>
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
                        <p class="is-size-7 has-text-weight-light has-text-grey">Total des jours de congés</p>
                    </div>
                </div>


            </div>
            <!-- Holiday request of the month -->
            <div class="column holiday-data is-5 p-5 mx-3 my-2 pb-0 has-background-white box">
                <div class="columns is-mobile ">
                    <div class="column is-8">
                        <p class="is-size-6 has-text-weight-bold has-text-grey">Congé</p>
                    </div>
                    <div class="column is-rest ">
                        <i class="bi bi-calendar-week "></i>
                    </div>
                </div>

                <div class="columns">
                    <div class="column p-0 pl-3 is-12">
                        <p class="is-size-3 "><?= $holiday_number["En_attente"] ?></p>
                    </div>
                </div>
                <div class="columns py-0">
                    <div class="column is-12">
                        <p class="is-size-7 has-text-weight-light has-text-grey">En attente</p>
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
                        <p class="is-size-7 has-text-weight-light has-text-grey">Total des documents</p>
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
                        <p class="is-size-3 "><?= $expense_number["En_attente"] ?></abbr></p>
                    </div>
                </div>
                <div class="columns py-0">
                    <div class="column is-12">
                        <p class="is-size-7 has-text-weight-light has-text-grey">En attente</p>
                    </div>
                </div>


            </div>



        </div>



    </div>

    <!-- Last file liste -->
    <div class="column is-12-touch  custom-show file-list-box is-half pt-5 ml-3 is-flex-shrink-2 mr-2 is-12-mobile box is-flex is-flex-direction-row is-align-items-center is-flex-wrap-wrap">
    
        <div class=" file-list mr-2">
            <p class="menu-label">
                Fiche de paie récente
            </p>
            <ul class="menu-list">
            <?php for ($i=0; $i < count($last_payslip) ; $i++) { ?>
                    <li class="is-size-6"><a data-fancybox data-caption="Document du <?= $last_payslip[$i]["date"] ?>" href="../assets/img/uploads/payslip/<?= $_SESSION["id"]?>/<?=$last_payslip[$i]["image"] ?>">Fiche de paie du <?= $last_payslip[$i]["date"] ?><span class="has-text-grey  ml-5 has-text-weight-light"> Voir</span></a></li>
               <?php } ?>
               <?php if(count($last_payslip) == 0) { ?>
                <p>Aucune fiche de paie</p>
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
               <?php if(count($last_file) == 0) { ?>
                <p>Aucun document</p>
                <?php } ?>
            </ul>
        </div>
    </div>
    <script> Fancybox.bind("[data-fancybox]", {
  // Your custom options
});</script>
