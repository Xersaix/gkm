<div class="columns is-flex is-flex-direction-column">



<?php
// Modal for deleting
foreach ($list as  $value) { ?>
  <div class="modal" id="<?= $value["expense_id"] ?>">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Supprimer</p>
      <button class="delete" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
     <p>Voulez-vous vraiment supprimer les frais datant du : <?= $value["payment_date"] ?> </p>
    </section>
    <footer class="modal-card-foot">
      <form action="" method="POST">
      <button value="<?= $value["expense_id"] ?>" name="delete" class="button is-success">Oui</button>
      </form>
      <button class="button">Non</button>
    </footer>
  </div>
</div>
<?php } ; ?>
<!-- End of modal -->
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
            <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                <thead>
                    <tr>
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
                        <td><?= $value["payment_date"] ?> </td>
                        <td><?= $value["expense_type"] ?></td>
                        <td><?= mb_strimwidth($value["reason"],0,10,'...') ?></td>
                        <td><?= $value["payment_ttc"] ?> €</td>

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
                          echo '<td class="has-text-centered"><span class="tag is-danger mt-3 is-medium tooltip">Refusé </span></td>';
                        }
                        ?>
                        <td class=""><a href="<?=$base64ImageSrc ?>" class="button" data-fancybox data-caption="<?= $imgData ?>">Voir</a></span></td>
                        <td class="has-text-centered p-2">
                <?php if ($value["status"] == "En attente") { ?> 
                <a class="button is-success has-text-white" href="controller-update-expense.php?id=<?= $value['expense_id'] ?>">
                <i class="bi bi-pencil-square"></i>
              </a>
              
              <button class="js-modal-trigger button is-danger " data-target="<?= $value["expense_id"]  ?>">
              <i class="bi bi-trash"></i>
              </button>
                

              <?php } ?>
              <button class="js-modal-trigger button mt-1" data-target="info-<?= $value["expense_id"]  ?>">
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