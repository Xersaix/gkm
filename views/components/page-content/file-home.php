<section class="section">
        <div class="container">
        <div class="three">
  <h1>Liste de document</h1>
</div>
            <div class="columns <?= count($list) == 0 ? "is-hidden" : "" ?> is-multiline">
                <!-- Card for each file -->
                <?= count($list) == 0 ? "Aucune dépense" : "" ?>
                <?php for ($i=0; $i < count($list) ; $i++) {  ?>
                    <div class="column is-3">
                    <div class="card">
                        <div class="card-content">
                            <div class="media">
                                <div class="media-left ml-0">
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
                        $fileName = "../assets/img/uploads/file/".$_SESSION["id"]."/".$list[$i]["image"];
                        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                        
                        ?>
                        <a href="../assets/img/uploads/file/<?= $_SESSION["id"]?>/<?=$list[$i]["image"] ?>" data-fancybox data-caption="Single image" class="card-footer-item">
                            Voir
                        </a>
                            <a href="../assets/img/uploads/file/<?= $_SESSION["id"]?>/<?=$list[$i]["image"] ?>" class="card-footer-item">Télécharger</a>
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