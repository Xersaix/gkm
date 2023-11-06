<div class="container">
        <div class="three">
  <h1>Informations personnelles</h1>
</div>

<div class="columns mt-3 is-flex is-flex-wrap-wrap is-justify-content-space-around is-align-item-strech">
    <div class="column box is-4 ">

    <ul>
    <li class="is-flex is-justify-content-space-between"> <p>Nom:</p> <p><?= $worker["lastname"] ?></p> </li>
    <hr class="mt-0">
    <li class="is-flex is-justify-content-space-between"> <p>Prénom:</p> <p><?= $worker["firstname"] ?></p> </li>
    <hr class="mt-0">
    <li class="is-flex is-justify-content-space-between"> <p>Email:</p> <p><?= $worker["email"] ?></p> </li>
    <hr class="mt-0">
    </ul>
    <div class="has-text-centered">
        <p>Modifier le mot de passe </p>
        <a class='button' href='controller-new-pass.php'>Modifier</a>
</div>
    </div>

</div>