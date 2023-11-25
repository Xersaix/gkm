<section class="section">
        <div class="container">
        <div class="three">
  <h1>Liste des employés</h1>
</div>
            <div class="table-container">
            <table class="table is-bordered is-striped is-hoverable is-fullwidth">
                <thead class="has-text-centered">
                    <tr>
                        <th>Nom</th>
                        <th>Congé</th>
                       
                        <th>Ajout de document</th>
                        <th>Ajustement de congé</th>
                        <th>Frais</th>
                        <th>Absence</th>
                        <th>Documents</th>
                    </tr>
                </thead>
                <tbody class="has-text-centered">
                    <!-- Employee Rows -->
                    <?php for ($i=0; $i < count($list) ; $i++) { ?>

                    <tr>
                        <td><p class="mt-2"><?=$list[$i]["firstname"]?> <?=$list[$i]["lastname"]?></p></td>
                        <td><p class="mt-2"><?=$list[$i]["holiday_count"]?> jours</p></td>
                        <td><a href="controller-add-file.php?id=<?=$list[$i]["id"]?>" class="button"><i class="bi bi-plus-lg"></i></a></td>
                        
                        <td><a href="controller-adjust-holiday.php?id=<?=$list[$i]["id"]?>" class="button">Ajuster</a></td>
                        <td><a href="controller-admin-expense.php?id=<?=$list[$i]["id"]?>" class="button">Liste de dépense</a></td>
                        <td><a href="controller-absence.php?id=<?=$list[$i]["id"]?>" class="button">Déclarer</a></td>
                        <td><a href="controller-admin-file.php?id=<?=$list[$i]["id"]?>" class="button">Voir</a></td>
                    </tr>

                 <?php   } ?>
                    <!-- Add more employees as needed -->
                </tbody>
            </table>
            </div>
        </div>
    </section>