<section class="section">
        <div class="container">
            <h1 class="title">Liste d'Employés</h1>
            <div class="table-container">
            <table class="table is-bordered is-striped is-hoverable is-fullwidth">
                <thead class="has-text-centered">
                    <tr>
                        <th>Nom</th>
                        <th>Congée</th>
                       
                        <th>Ajout de document</th>
                        <th>Ajustement de congée</th>
                    </tr>
                </thead>
                <tbody class="has-text-centered">
                    <!-- Employee Rows -->
                    <?php for ($i=0; $i < count($list) ; $i++) { ?>

                    <tr>
                        <td><?=$list[$i]["firstname"]?> <?=$list[$i]["lastname"]?></td>
                        <td><?=$list[$i]["holiday_count"]?> jours</td>
                        <td><a href="controller-add-file.php?id=<?=$list[$i]["id"]?>" class="button"><i class="bi bi-plus-lg"></i></a></td>
                        
                        <td><a class="button">Anchor</a></td>
                    </tr>

                 <?php   } ?>
                    <!-- Add more employees as needed -->
                </tbody>
            </table>
            </div>
        </div>
    </section>