<div class="columns is-flex is-justify-content-center">
    <div class="column is-half ">
        <div class="three">
            <h1>Déclarer une absence</h1>
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

            <label class="checkbox my-5">
                <input type="checkbox" name="fullday">
                Journée complète.
            </label>


            <p class="has-text-grey has-text-weight-light is-size-7 has-text-centered">Attention le nombre de jour de congé sera deduis en conséquence !</p>


            <div class="field">
                <div class="control has-text-centered my-3">
                    <button type="submit" class="button">Ajouter</button>
                </div>
            </div>
        </form>
    </div>
</div>