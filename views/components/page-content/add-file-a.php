<div class="columns is-flex is-justify-content-center">
    <div class="column is-half ">
    <div class="three">
  <h1>Ajout de document</h1>
</div>
        <form action="" method="POST" enctype="multipart/form-data">


            <!-- Date de document -->
            <div class="field">
                <label class="label">Date du document <span class="has-text-danger">
                        <?= $errors["date"] ?? "" ?>
                    </span></label>
                <div class="control">
                    <input class="input" type="date"
                        value="<?= htmlspecialchars($_POST['date_date'] ?? date('Y-m-d') ) ?>" name="date">

                </div>
            </div>

            <div class="field">
  <label class="label">Titre <span class="has-text-danger">
                        <?= $errors["title"] ?? "" ?>
                    </span></label>
  <div class="control">
    <input class="input" type="text" placeholder="Titre du document" name="title">
  </div>
</div>

            <!-- File -->
            <div id="file-js-example" class="file is-info has-name mt-5">
                <label class="file-label">
                    <input class="file-input" type="file" name="file">
                    <span class="file-cta">
                        <span class="file-icon">
                            <i class="bi bi-upload mr-3"></i>
                        </span>
                        <span class="file-label">
                            Fichier:<span class="has-text-danger"><?= $errors["file"] ?? "" ?></span>
                        </span>
                    </span>
                    <span class="file-name">
                        <?= $_FILES["file"]["name"] ?? "Aucun fichier" ?>
                    </span>
                </label>
            </div>

            <div class="field">
                <div class="control has-text-centered my-3">
                    <button type="submit" class="button">Ajouter</button>
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