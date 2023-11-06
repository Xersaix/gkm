<div class="columns is-flex is-justify-content-center">

    <div class="column is-5">
    <div class="three">
  <h1>Modification du mot de passe</h1>
</div>
        <form action="" method="POST">

                    <!-- Password -->
            <label for="current-password">Mot de passe  actuelle <span class="has-text-danger">
                    <?= $errors["current-password"] ?? "" ?>
                </span> </label>
            <div class="field">
                <p class="control has-icons-left has-icons-right">
                    <input class="input is-link" type="password" name="current-password" placeholder="Mot de passe"
                        id="current-password">
                    <span class="icon is-small is-left">
                        <i class="bi bi-lock-fill"></i>

                    </span>


                </p>
            </div>

            <!-- Password -->
            <label for="password">Nouveau mot de passe <span class="has-text-danger">
                    <?= $errors["password"] ?? "" ?>
                </span> </label>
            <div class="field">
                <p class="control has-icons-left has-icons-right">
                    <input class="input is-link" type="password" name="password" placeholder="Mot de passe"
                        id="password">
                    <span class="icon is-small is-left">
                        <i class="bi bi-lock-fill"></i>

                    </span>
                    <span class="icon is-small is-right">
                        <i class="bi bi-eye-fill is-clickable " id="pass-view"></i>

                    </span>

                </p>
            </div>

            <!-- Password Verify -->
            <label for="password2">Confirmation du nouveau mot de passe <span class="has-text-danger">
                    <?= $errors["password2"] ?? "" ?>
                </span> </label>
            <div class="field">
                <p class="control has-icons-left has-icons-right">
                    <input class="input is-link" type="password" name="password2" placeholder="Mot de passe"
                        id="password2">
                    <span class="icon is-small is-left">
                        <i class="bi bi-lock-fill"></i>

                    </span>
                    <span class="icon is-small is-right">
                        <i class="bi bi-eye-fill is-clickable " id="pass-view2"></i>

                    </span>

                </p>
            </div>

            <!-- Add -->
            <div class="field is-flex is-justify-content-center">
            <button class="button is-link " type="submit">Modifier</button>
            </div>
        </form>

    </div>
</div>
<script src="../assets/js/add-worker.js"></script>