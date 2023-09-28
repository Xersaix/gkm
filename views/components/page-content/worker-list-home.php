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
                        <th>Congée</th>
                       
                        <th>Ajout de document</th>
                        <th>Ajustement de congée</th>
                        <th>Frais</th>
                    </tr>
                </thead>
                <tbody class="has-text-centered">
                    <!-- Employee Rows -->
                    <?php for ($i=0; $i < count($list) ; $i++) { ?>

                    <tr>
                        <td><?=$list[$i]["firstname"]?> <?=$list[$i]["lastname"]?></td>
                        <td><?=$list[$i]["holiday_count"]?> jours</td>
                        <td><a href="controller-add-file.php?id=<?=$list[$i]["id"]?>" class="button"><i class="bi bi-plus-lg"></i></a></td>
                        
                        <td><a href="controller-adjust-holiday.php?id=<?=$list[$i]["id"]?>" class="button">Ajuster</a></td>
                        <td><a href="controller-admin-expense.php?id=<?=$list[$i]["id"]?>" class="button">Liste de dépense</a></td>
                    </tr>

                 <?php   } ?>
                    <!-- Add more employees as needed -->
                </tbody>
            </table>
            </div>
        </div>
    </section>