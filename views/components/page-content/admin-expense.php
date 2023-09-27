<div class="columns is-flex is-flex-direction-column">


<!-- modal validation -->
    <?php
    foreach ($list as  $value) { ?>
    <div class="modal" id="<?= $value['expense_id'] ?>">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head has-text-center">
                <p class="modal-card-title ">Dépense du :
                    <?= $value["payment_date"] ?>
                </p>
                <button class="delete" aria-label="close"></button>
            </header>
            <section class="modal-card-body ">
                <form action="" method="POST" >
                    <span class="is-flex is-flex-direction-column mb-5" >
                    <label for="reason" class="has-text-weight-bold">Raison du refus</label>
                    <textarea name="reason" id="reason" cols="30" rows="5"></textarea>
                    <p class="has-text-weight-light has-text-grey is-align-self-center">Vous devez donner une raison
                        pour refuser une dépense</p>
                    </span>    
                    <button value="<?= $value['expense_id'] ?>" name="valid" class="button is-success">Valider</button>

                    <button class="button is-danger" name="refuse" value="<?= $value['expense_id'] ?>">Refuser</button>
                </form>
            </section>

        </div>
    </div>
    <?php } ; ?>
    <!-- End -->


    <?php
// Modal for detail
foreach ($list as  $value) { ?>
  <div class="modal" id="info-<?= $value["expense_id"] ?>">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Detail</p>
      <button class="delete" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      <p>Raison de la dépense:</p>
     <p><?= $value["reason"] ?> </p>
     <?php
          if($value["status"] == "Accepté")
          {
              echo '<p>Accepté le '.$value["validation_date"].'<p>';
          }else if($value["status"] == "Refusé")
          {
            echo '<p>Accepté le '.$value["validation_date"].'<p>';
            echo '<p> Raison: <br>'.$value["result_commentary"]."<p>";
          }
     ?>
    </section>
    
  </div>
</div>
<?php } ; ?>
<!-- End of modal -->

    <h1 class="title">Liste de Dépenses </h1>
    <?= ($list[0]["status"] == null || count($list) == 0) ? "Aucune dépense" : "" ?>
    <div class="table-container <?= ($list[0]["status"] == null || count($list) == 0) ? "is-hidden" : "" ?>">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth ">
            <thead class="has-text-centered">
                <tr >
                    <th>Date</th>
                    <th>Type de Dépense</th>
                    <th>Raison</th>
                    <th>Montant</th>
                    <th>Status</th>
                    <th>Justificatif</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="">
                <?php foreach ($list as  $value) { ?>
                <?php
                        // get the base64 file
                        $imgData = $value["image"];
    
                        // link to the file for the img tag <img src="data:image/gif;base64,R0lGODdhAQABAPAAAP8AAAAAACwAAAAAAQABAAACAkQBADs" />
                        $base64ImageSrc = "../assets/img/uploads/expense/".$_SESSION["id"]."/". $imgData; 
    
                      ?>

                <tr class="has-text-centered">
                    <td>
                        <?= $value["payment_date"] ?>
                    </td>
                    <td>
                        <?= $value["expense_type"] ?>
                    </td>
                    <td>
                        <?= mb_strimwidth(($value["reason"]) ? $value["reason"] : "" ,0,10,'...') ?>
                    </td>
                    <td>
                        <?= $value["payment_ttc"] ?> €
                    </td>

                    <?php
                            if($value["status"] == "Accepté")
                            {
                                echo '<td class="has-text-centered"><span class="tag is-success mt-3 is-medium">Accepté</span></td>';
                            }
                            else if($value["status"] == "En attente")
                            {
                                echo '<td class="has-text-centered"><span class="tag is-warning mt-3 is-medium"> En attente </span></td>';
                            }
                            else if($value["status"] == "Refusé")
                            {
                                echo '<td class="has-text-centered"><span class="tag is-danger mt-3 is-medium tooltip">Refusé</span></td>';
                            }
                            ?>
                    <td class=""><a href="<?=$base64ImageSrc ?>" class="button" data-fancybox data-caption="<?= $imgData ?>">Voir</a></span></td>
                    <td class="has-text-centered p-2">
                        <?php if ($value["status"] == "En attente") { ?>

                        <button class="js-modal-trigger button " data-target="<?= $value['expense_id'] ?>">
                        <i class="bi bi-check has-text-weight-bold has-text-success is-size-4"></i>/<i class="bi bi-x-circle ml-1 is-size-5 has-text-weight-bold has-text-danger"></i>
                        </button>


                        <?php } ?>
                        <button class="js-modal-trigger button " data-target="info-<?= $value["expense_id"]  ?>">
              <i class="bi bi-info-circle"></i>
              </button>
                    </td>
                </tr>



                <?php } ?>

            </tbody>
        </table>
    </div>

</div>
<script src="../assets/js/modal.js"></script>
<script> Fancybox.bind("[data-fancybox]", {
  // Your custom options
});</script>