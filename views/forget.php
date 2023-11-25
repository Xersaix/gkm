<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Récupérer votre mot de passe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/login.css">

    <title>Document</title>
</head>

<body>
    <div class="hero is-fullheight">
        
        <div class="hero-body is-justify-content-center is-align-items-center">
        
            <div class="columns is-flex is-flex-direction-column box" >
            <p class="has-text-centered has-text-weight-semi-bold is-size-4 mx-3">Récupérer votre mot de passe</p>
                <form action="" method="POST">
                    <div class="column">
                        <label for="email">Email: <span class="has-text-danger"><?= $errors["email"] ?? "" ?></span></label>
                        <div class="field">
                            <p class="control has-icons-left">
                                <input class="input is-link" type="email" name="email" placeholder="Email" value="<?= $_POST["email"] ?? "" ?>" id="email" id="email">
                                <span class="icon is-small is-left">
                                    <i class="bi bi-envelope-fill"></i>
                                </span>

                            </p>
                        </div>
                    </div>
                    
                    <div class="column">
                        <button class="button is-link is-fullwidth" type="submit">Envoyer un Email</button>
                    </div>
                    <div class="has-text-centered">
                        <?php if ($send) { ?>
                            <p>Email envoyer avec succès</p>

                            <?php }?>
                        </p>
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>

</html>
<script src="../assets/js/login.js"></script>
