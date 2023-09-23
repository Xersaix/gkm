<div class="columns is-flex is-flex-direction-column">



<?php
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

<h1 class="title">Liste de Dépenses </h1>
        <div class="table-container">
            <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Type de Dépense</th>
                        <th>Raison</th>
                        <th>Montant</th>
                        <th>Status</th>
                        <th>Justificatif</th>
                        <th>Preuve</th>
                    </tr>
                </thead>
                <tbody>
               <?php foreach ($list as  $value) { ?>
                <?php
                    // get the base64 file
                    $imgData = $value["image"];

                    // link to the file for the img tag <img src="data:image/gif;base64,R0lGODdhAQABAPAAAP8AAAAAACwAAAAAAQABAAACAkQBADs" />
                    $base64ImageSrc = "../assets/img/uploads/expense/" . $imgData; 

                  ?>

                    <tr class="has-text-centered">
                        <td><?= $value["payment_date"] ?> </td>
                        <td><?= $value["expense_type"] ?></td>
                        <td><?= $value["reason"] ?></td>
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
                            echo '<td class="has-text-centered"><span class="tag is-danger mt-3 is-medium">Refusé</span></td>';
                        }
                        ?>
                        <td class=""><a href="<?=$base64ImageSrc ?>" data-lightbox="image-<?= $value["expense_id"]  ?>" data-title="My caption"><img class="image is-64x64 pl-5" src="<?=$base64ImageSrc ?>" alt="" class=""  ?></a></span></td>
                        <td class="has-text-centered p-2">
                <?php if ($value["status"] == "En attente") { ?> 
                <button class="button is-success has-text-white"><a href="controller-update-expense.php?id=<?= $value['expense_id'] ?>">
                Modifier
              </a>
              </button>
              <button class="js-modal-trigger button is-danger " data-target="<?= $value["expense_id"]  ?>">
                Supprimer
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