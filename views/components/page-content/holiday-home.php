


<h1 class="title">Monthly Planning</h1>
            <table class="table is-bordered  is-narrow is-hoverable is-fullwidth">
                <thead>
                    <tr>
                        <th style="border-top:none;border-left:none;"></th>
                        <!-- Dynamically generate columns for each day of the month -->
                      
                          
                           <?php   for ($day = 1; $day <= 31; $day++) { ?>
                                <th class="table-top"><?= $day ?></th>
                         <?php   } ?>
                        
                        
                        
                    </tr>
                </thead>
                <tbody>

                <tr style="border:none;">
                        
                        <td style="border:none;">Employé</td>
                        <!-- Add tasks for each day of the month -->
                        <?php   for ($day = 1; $day <= 31; $day++) { ?>
                               <td style="border:none;"></td>
                                <?php   } ?>
                    </tr>
                    <tr>
                        
                        <td>John</td>
                        <!-- Add tasks for each day of the month -->
                        <script>
                            for (let day = 1; day <= 31; day++) {
                                document.write('<td></td>');
                            }
                        </script>
                    </tr>

                    <!-- Add more rows for additional employees -->
                </tbody>
            </table>