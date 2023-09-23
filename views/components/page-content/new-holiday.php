

<div class="columns is-flex is-flex-direction-row is-justify-content-center">
    
    <div class="column is-half ">
        <h1>Demande de congé</h1>
    <form action="" method="post">

        <label for="date">Date du jour de congée:<span class="has-text-danger">
            <?= $errors["date"] ?? "" ?>
        </span></label></label>
    <!-- Date insertion -->
    <div class="field">
       <input type="date" name="date" class="input" id="date"> 
    </div>
    

    <label class="checkbox my-5">
        <input type="checkbox" name="fullday">
        Journée complète.
    </label>

    <div class="field">
        <button class="button is-dark is-outlined" type="submit">Envoyer</button>
    </div>
    </form>
    </div>
</div>