<section class="section">
        <div class="container">
        <div class="three">
  <h1>Liste de document</h1>
</div>

<!--  Document's modal -->
<?php for ($i=0; $i < count($list) ; $i++) {  ?>

<div class="modal" id="society-<?=$list[$i]["id"]?>">
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
  <button value="<?= $list[$i]["id"] ?>" name="deleteS" class="button is-success">Oui</button>
  </form>
  <button class="button">Non</button>
</footer>
</div>
</div>



<?php } ?>



            <div class="columns  is-multiline">
                <!-- Card for each file -->
                <?= count($list) == 0 ? "Aucun document" : "" ?>
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
                                    <p class="title is-5"><?= $list[$i]["title"] ?></p>
                                    <p class="subtitle is-6"><?= $list[$i]["date"] ?></p>
                                </div>
                            </div>
                        </div>
                        <footer class="card-footer">
                        <?php
                        $fileName = '../assets/img/uploads/society/'.$list[$i]["image"];
                        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                        
                        ?>
                        <a href="../assets/img/uploads/society/<?=$list[$i]["image"] ?>" data-fancybox data-caption="Single image" class="card-footer-item">
                            Voir
                        </a>
                            
                        <a class="js-modal-trigger  card-footer-item " data-target="society-<?= $list[$i]["id"]  ?>">
                        Supprimer
                        </a>
                        </footer>
                    </div>
                </div>
               <?php } ?>

                <!-- Repeat the above card structure for each file -->
                
            </div>
        </div>
    </section>

    <script> Fancybox.bind("[data-fancybox]", {
  // Your custom options
});</script>
<script src="../assets/js/modal.js"></script>