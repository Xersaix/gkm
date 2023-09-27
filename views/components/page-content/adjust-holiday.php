<div class="columns is-flex is-flex-direction-column is-justify-content-center is-align-items-center">
    <div
        class="column is-4 is-flex is-flex-direction-column is-align-items-center is-justify-content-center box">

        <p class="is-size-3 has-text-centered mb-0 ">
           <span id="count"> <?= $holiday_count["holiday_count"] ?></span><br>

        </p>
        <p class="is-size-6 mt-0 has-text-weight-light">Jours de congée total</p>
        <p class="my-0" id="result"><?= $holiday_count["holiday_count"] ?> + 0 = <?= $holiday_count["holiday_count"] ?></p>
        <form action="" method="POST">
            <!-- Plus/Minus choice -->
            <label>Ajouter/Enlever: <span class="has-text-danger"><?= $errors["choice"] ?? "" ?></span> </label>
            <div class="control">
                <label class="radio">
                    <input type="radio" name="answer" value="plus" checked id="choice1">
                    Ajouter
                </label>
                <label class="radio">
                    <input type="radio" name="answer" value="minus" id="choice2">
                    Enlever
                </label>
            </div>
            <!-- Number -->
            <div class="field ">
                <label for="number" class="label has-text-weight-light">Nombre: <span class="has-text-danger"><?= $errors["number"] ?? "" ?></span></label>
                <div class="control">
                  <input class="input" type="number" step=".5" min="0" name="number" placeholder="Nombre de jour" id="number">
                </div>
              </div>
              <!-- Submit post -->
              <div class="field is-flex is-justify-content-center">
                <div class="control">
                  <button class="button is-link" type="submit">Modifier</button>
                </div>
              </div>
        </form>

    </div>
</div>

<script src="../assets/js/plus-minus.js"></script>