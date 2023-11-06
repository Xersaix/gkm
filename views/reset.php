<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>GKM Gestionnaire de congé payer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/login.css">

    <title>Document</title>
</head>

<body>
    <div class="hero is-fullheight">
        <div class="hero-body is-justify-content-center is-align-items-center">
            <?php if (!$invalid)   {  ?>
            <div class="columns is-flex is-flex-direction-column box" >
            <p class="has-text-centered has-text-weight-semi-bold is-size-4 mx-3">Nouveau mot de passe</p>
                <form action="" method="POST">
                    <div class="column">
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
                    </div>
                    <div class="column">
 <!-- Password Verify -->
 <label for="password2">Confirmation du mot de passe<span class="has-text-danger">
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
                    </div>
                    <div class="column">
                        <button class="button is-link is-fullwidth" type="submit">Changer le mot de passe</button>
                    </div>
                    <div class="has-text-centered">
                        <?php if($changed == true){ ?>

                            <p>Changement de mot de passe compléter avec succès</p>
                            <p>Vous aller etre redirigé vers la page d'accueil.</p>
                            <script>

                                setTimeout(function(){ window.location.href="http://localhost/Stage/holiday/controllers/controller-home.php";  }, 5000);
                                    


                            </script>
                        <?php } ?>
                        </p>
                    </div>
                </form>
            </div>
            <?php }else{  ?>

                <div class="columns  is-flex is-flex-direction-column box p-5 has-text-centered">
                    <p>Le lien est invalide ou à expirer veuillez suivre le lien ci-dessous pour retourner à la page d'accueil.</p>
                    <a href="controller-home.php">Accueil</a>
                </div>


                <?php }  ?>
        </div>
    </div>
</body>

</html>
<script src="../assets/js/add-worker.js"></script>
