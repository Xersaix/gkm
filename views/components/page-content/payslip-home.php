<section class="section">
        <div class="container">
        <div class="three">
  <h1>Liste de fiche de paie</h1>
</div>
            <div class="columns is-multiline">
                <!-- Card for each file -->

                <?php for ($i=0; $i < count($list) ; $i++) {  ?>
                    <div class="column is-one-third">
                    <div class="card">
                        <div class="card-content">
                            <div class="media">
                                <div class="media-left">
                                    <figure class="image is-48x48">
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
                        $fileName = "../assets/img/uploads/payslip/".$_SESSION["id"]."/".$list[$i]["image"];
                        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
                        
                        ?>
                        <a href="../assets/img/uploads/payslip/<?= $_SESSION["id"]?>/<?=$list[$i]["image"] ?>" data-fancybox data-caption="Single image" class="card-footer-item">
                            Voir
                        </a>
                            <a href="../assets/img/uploads/payslip/<?= $_SESSION["id"]?>/<?=$list[$i]["image"] ?>" class="card-footer-item">Télécharger</a>
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