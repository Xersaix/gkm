<div class="columns is-flex is-justify-content-center">

    <div class="column is-5">
        <form action="" method="POST">

            <!-- Firstname -->
            <div class="field">
                <label for="firstname">Prénom  <span class="has-text-danger">
                    <?= $errors["firstname"] ?? "" ?>
                </span></label>
                <input type="text" class="input is-link" name="firstname" id="firstname" placeholder="Prénom" value="<?= $_POST["firstname"] ?? "" ?>">
            </div>
            <!-- Lastname -->
            <label for="lastname">Nom  <span class="has-text-danger">
                <?= $errors["lastname"] ?? "" ?>
            </span></label>
            <input type="text" class="input is-link" name="lastname" id="lastname" placeholder="Nom" value="<?= $_POST["lastname"] ?? "" ?>">

            <!-- Email -->

            <label for="email">Email <span class="has-text-danger">
                    <?= $errors["email"] ?? "" ?>
                </span></label>
            <div class="field">
                <p class="control has-icons-left">
                    <input class="input is-link" type="email" name="email" placeholder="Email" value="<?= $_POST["email"] ?? "" ?>" id="email" id="email">
                    <span class="icon is-small is-left">
                        <i class="bi bi-envelope-fill"></i>
                    </span>

                </p>
            </div>
            <!-- Password -->
            <label for="password">Mot de passe <span class="has-text-danger">
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
            <label for="password2">Mot de passe <span class="has-text-danger">
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
            <button class="button is-link " type="submit">Ajouter l'employer</button>
            </div>
        </form>

    </div>
</div>
<script src="../assets/js/add-worker.js"></script>