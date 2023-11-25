<section class="section mb-5"> 
    <div class="three">
<h1>Fichier de  <?=$worker["firstname"]?> <?=$worker["lastname"]?> </h1>
</div>
</section>

<!--  Document's modal -->
<?php for ($i=0; $i < count($list) ; $i++) {  ?>

    <div class="modal" id="doc-<?= $list[$i]["id"] ?>">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Detail</p>
      <button class="delete" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      <p>Raison de la dépense:</p>

      <?= $list[$i]["id"] ?>
    </section>
    <footer class="modal-card-foot">
      <form action="controller-transition.php" method="POST">
        <input type="hidden" name="file-image" value= "<?= $list[$i]["image"] ?>">
        <input type="hidden" name="worker-id" value= "<?= $list[$i]["ID_Worker"] ?>">
      <button value="<?= $list[$i]["id"] ?>" name="deleteD" class="button is-success">Oui</button>
      </form>
      <button class="button">Non</button>
    </footer>
  </div>
</div>



<?php } ?>



<!--  Payslip's modal -->
<?php for ($i=0; $i < count($list2) ; $i++) {  ?>

<div class="modal" id="pay-<?= $list2[$i]["id"] ?>">
<div class="modal-background"></div>
<div class="modal-card">
<header class="modal-card-head">
  <p class="modal-card-title">Detail</p>
  <button class="delete" aria-label="close"></button>
</header>
<section class="modal-card-body">
  <p>Raison de la dépense:</p>

  <?= $list2[$i]["id"] ?>
</section>
<footer class="modal-card-foot">
  <form action="controller-transition.php" method="POST">
    <input type="hidden" name="file-image" value= "<?= $list2[$i]["image"] ?>">
    <input type="hidden" name="worker-id" value= "<?= $list2[$i]["ID_Worker"] ?>">
  <button value="<?= $list2[$i]["id"] ?>" name="deleteP" class="button is-success">Oui</button>
  </form>
  <button class="button">Non</button>
</footer>
</div>
</div>



<?php } ?>

<h2 class="is-size-4 is-underlined is-italic">Document</h2>
<!-- Document -->


        <div class="columns  is-multiline">
            <!-- Card for each file -->
            <p><?= count($list) == 0 ? "Aucun document" : "" ?></p>
            <?php for ($i=0; $i < count($list) ; $i++) {  ?>
                <div class="column is-3">
                <div class="card">
                    <div class="card-content">
                        <div class="media">
                            <div class="media-left">
                                <figure class="image ml-0 mr-2 is-48x48">
                                <i class="bi bi-file-text-fill is-size-3"></i>
                                </figure>
                            </div>
                            <div class="media-content">
                                <p class="title is-5"><?= $list[$i]["file_type_name"] ?></p>
                                <p class="subtitle is-6"><?= $list[$i]["date"] ?></p>
                            </div>
                        </div>
                    </div>
                    <footer class="card-footer">
                    <?php
                    $fileName = "../assets/img/uploads/file/".$_GET["id"]."/".$list[$i]["image"];
                    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                    
                    ?>
                    <a href="../assets/img/uploads/file/<?= $_GET["id"]?>/<?=$list[$i]["image"] ?>" data-fancybox data-caption="<?= $list[$i]["image"] ?>" class="card-footer-item">
                        Voir
                    </a>
                   
                    <a class="js-modal-trigger  card-footer-item " data-target="doc-<?= $list[$i]["id"]  ?>">
             Supprimer
            </a>
                    </footer>
                </div>
            </div>
           <?php } ?>

            <!-- Repeat the above card structure for each file -->
            
        </div>





<h2 class="is-size-4 is-underlined is-italic">Fiche de paie</h2>
<!-- Payslip -->

<div class="columns  is-multiline">
            <!-- Card for each file -->
            <p><?= count($list2) == 0 ? "Aucune fiche de paie" : "" ?></p>
            <?php for ($i=0; $i < count($list2) ; $i++) {  ?>
                <div class="column is-3">
                <div class="card">
                    <div class="card-content">
                        <div class="media">
                            <div class="media-left">
                                <figure class="image is-48x48">
                                <i class="bi bi-file-text-fill is-size-3"></i>
                                </figure>
                            </div>
                            <div class="media-content">
                                <p class="title is-5"><?= $list2[$i]["file_type_name"] ?></p>
                                <p class="subtitle is-6"><?= $list2[$i]["date"] ?></p>
                            </div>
                        </div>
                    </div>
                    <footer class="card-footer">
                    <?php
                    $fileName = "../assets/img/uploads/payslip/".$_GET["id"]."/".$list2[$i]["image"];
                    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                    
                    ?>
                    <a href="../assets/img/uploads/payslip/<?= $_GET["id"]?>/<?=$list2[$i]["image"] ?>" data-fancybox data-caption="<?= $list2[$i]["image"] ?>" class="card-footer-item">
                        Voir
                    </a>
                   
                    <a class="js-modal-trigger  card-footer-item " data-target="pay-<?= $list2[$i]["id"]  ?>">
                        Supprimer
                    </a>
                    </footer>
                </div>
            </div>
           <?php } ?>




<script> Fancybox.bind("[data-fancybox]", {
// Your custom options
});</script>
<script src="../assets/js/modal.js"></script>