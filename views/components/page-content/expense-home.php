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
      <p>Voulez-vous vraiment supprimer les frais datant du : <?= $value["payment_date"] ?> <br>
      Type de dépense: <?= $value["expense_type"] ?><br>
      Raison: <?= $value["reason"] ?> <br>
      Montant: <?= $value["payment_ttc"]  ?> €<br>
    
      </p>
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
      <p class="modal-card-title">Informations</p>
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
    <footer class="modal-card-foot">

    </footer>
  </div>
</div>
<?php } ; ?>
<!-- End of modal -->

<div class="three">
  <h1>Liste de frais</h1>
</div>
<?= ($list[0]["status"] == null || count($list) == 0) ? "Aucune dépense" : "" ?>
        <div class="table-container <?= ($list[0]["status"] == null || count($list) == 0) ? "is-hidden" : "" ?>">
            <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth has-text-centered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Type de Dépense</th>
                        <th>Raison</th>
                        <th>Montant</th>
                        <th>Status</th>
                        <th>Justificatif</th>
                        <th>Informations</th>
                    </tr>
                </thead>
                <tbody class="">
              <?php foreach ($list as  $value) { ?>
                <?php
                    // get the base64 file
                    $imgData = $value["image"];

                    
                    $ImageSrc = "../assets/img/uploads/expense/".$_SESSION["id"]."/". $imgData; 

                  ?>

                    <tr class="has-text-centered">
                        <td><p class="mt-3"><?= date("d/m/Y",strtotime($value["payment_date"])) ?> </p></td>
                        <td><p class="mt-3"> <?= $value["expense_type"] ?></p></td>
                        <td><p class="mt-3"><?= mb_strimwidth($value["reason"],0,10,'...') ?></p></td>
                        <td><p class="mt-3"><?= $value["payment_ttc"] ?> €</p></td>
                        <!-- Change the button  -->
                        <?php
                        if($value["status"] == "Accepté")
                        {
                            echo '<td class="has-text-centered"><span class="tag is-success mt-2 is-medium"><p class="mx-2">Accepté</p></span></td>';
                        }
                        else if($value["status"] == "En attente")
                        {
                            echo '<td class="has-text-centered"><span class="tag is-warning mt-2 is-medium"> En attente </span></td>';
                        }
                        else if($value["status"] == "Refusé")
                        {
                          echo '<td class="has-text-centered"><span class="tag is-danger px-3 mt-2 is-medium tooltip"><p class="mx-3"> Refusé</p> </span></td>';
                        }
                        ?>
                        <td class=""><a href="<?=$ImageSrc ?>" class="button mt-1" data-fancybox data-caption="<?= $imgData ?>">Voir</a></span></td>
                        <td class="has-text-centered p-2">
                <?php if ($value["status"] == "En attente") { ?> 
                <a class="button " href="controller-update-expense.php?id=<?= $value['expense_id'] ?>">
                <i class="bi bi-pencil-square"></i>
              </a>
              

              <?php } ?>
              <button class="js-modal-trigger button  " data-target="info-<?= $value["expense_id"]  ?>">
              <i class="bi bi-info-circle"></i>
              </button>


              <?php if ($value["status"] == "En attente") { ?> 
                <button class="js-modal-trigger button is-danger is-outlined " data-target="<?= $value["expense_id"]  ?>">
              <i class="bi bi-trash"></i>
              </button>
              <?php } ?>
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