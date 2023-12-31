<div class="columns is-flex is-justify-content-center">

    <div class="column is-half">
    <div class="three">
  <h1>Nouvelle dépense</h1>
</div>
        <form action="" method="POST" enctype="multipart/form-data">

            <!-- Date de paiment -->
            <div class="field">
                <label class="label">Date de paiement <span class="has-text-danger">
                        <?= $errors["date"] ?? "" ?>
                    </span></label>
                <div class="control">
                    <input class="input" type="date"
                        value="<?= htmlspecialchars($_POST['expense_date'] ?? '') ?>" name="expense_date">

                </div>
            </div>
            <!-- Type de frais -->
            <div class="field">
                <label class="label">Type de frais <span class="has-text-danger">
                        <?= $errors["type"] ?? "" ?>
                    </span></label>
                <div class="control">
                    <div class="select">
                        <select name="expense_type">
                            <?php foreach($types as $type) { ?>
                            <option value="<?= $type['id'] ?>">
                                <?= $type["name"] ?>
                            </option>

                            <?php  }  ?>
                        </select>
                    </div>
                </div>
            </div>
            <!-- Price TTC -->
            <div class="field">
                <label class="label">Prix TTC <span class="has-text-danger">
                        <?= $errors["price_ttc"] ?? "" ?>
                    </span></label>
                <div class="control">
                    <input class="input" type="number"
                        value="<?= htmlspecialchars($_POST['price_ttc'] ?? '') ?>" step="0.10"
                        name="price_ttc">
                </div>
            </div>

            <!-- Raison -->
            <div class="field">
                <label class="label">Raison <span class="has-text-danger">
                        <?= $errors["reason"] ?? "" ?>
                    </span></label>
                <div class="control">
                    <textarea class="textarea"
                        name="expense_reason"><?= htmlspecialchars($_POST['expense_reason'] ?? '') ?></textarea>
                </div>
            </div>

            <!-- File -->
            <div id="file-js-example" class="file is-info has-name">
                <label class="file-label">
                  <input class="file-input" type="file" name="file">
                  <span class="file-cta">
                    <span class="file-icon">
                      <i class="fas fa-upload"></i>
                    </span>
                    <span class="file-label">
                        Justificatif:<span class="has-text-danger">
                            <?= $errors["file"] ?? "" ?>
                        </span>
                    </span>
                  </span>
                  <span class="file-name">
                    <?= $_FILES["file"]["name"] ?? "Aucun fichier" ?>
                  </span>
                </label>
              </div>

              <div class="field">
                <div class="control has-text-centered my-3">
                    <button class="button is-info is-outlined" type="submit">Ajouter</button>
                </div>
            </div>

        </form>

    </div>


</div>
<script>
    const fileInput = document.querySelector('#file-js-example input[type=file]');
    fileInput.onchange = () => {
      if (fileInput.files.length > 0) {
        const fileName = document.querySelector('#file-js-example .file-name');
        fileName.textContent = fileInput.files[0].name;
      }
    }
  </script>