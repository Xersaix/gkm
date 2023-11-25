
<div class="columns mx-0 calendar-menu ">

<div class="column  is-flex is-flex-direction-row is-align-items-center">
<a class="button is-link is-rounded" href="?day=<?= date("d")?>&month=<?= date("m")?>&year=<?= date("y")?>">Aujourd'hui</a>
    <a href="?day=<?= date("d",strtotime($prev_month))?>&month=<?= date("m",strtotime($prev_month))?>&year=<?= date("y",strtotime($prev_month))?>"><i class="bi bi-arrow-left-circle-fill is-size-3 mx-2 "></a></i>
    <p class="mb-0" ><?= $selected_date ?></p>
    <a href="?day=<?= date("d",strtotime($next_month))?>&month=<?= date("m",strtotime($next_month))?>&year=<?= date("y",strtotime($next_month))?>"><i class="bi bi-arrow-right-circle-fill is-size-3 mx-2 "></a></i>
</div>
</div>

<div class="three">
  <h1>Calendrier des demandes</h1>
</div>
<div class="tags">
  <span class="tag is-success mx-1">Congé accepter</span>
  <span class="tag is-warning  mx-1">Congé en attente</span>
  <span class="tag is-danger  mx-1">Congé refuser</span>
  <span class="tag is-primary  mx-1">Absent</span>
  <span class="tag is-primary  mx-1"><i class="bi bi-dash-circle-dotted mr-2"></i>Demi-journée</span>
  <span class="tag is-primary  mx-1"><i class="bi bi-dash-circle mr-2"></i>Journée</span>
</div>
<div class="table-container my-3">
            <table class="table is-bordered  is-narrow is-hoverable is-fullwidth">
                <thead>
                    <tr>
                        <th style="border-top:none;border-left:none;background-color: #F5F7FB;"></th>
                        <!-- Dynamically generate columns for each day of the month -->
                      
                          
                           <?php   for ($day = 1; $day <= cal_days_in_month(CAL_GREGORIAN, $_GET["month"], $_GET["year"]); $day++) {
                                $date1  = \DateTime::createFromFormat($format, $day . "-" . $_GET["month"] . "-" . $_GET["year"]);
                                $day_of_week = $date1->format('D');
                            ?>
                                <th class="table-top <?= ($day_of_week == "Sun" || $day_of_week == "Sat") ? 'has-background-grey-light' : "" ?>"><?= $day ?></th>
                         <?php   } ?>
                        
                        
                        
                    </tr>
                </thead>
                <tbody >

                <tr style="border:none;" >
                        
                        <td style="border:none;">Employé</td>
                        <!-- Add tasks for each day of the month -->
                        <?php   for ($day = 1; $day <= $day_in_month ; $day++) { ?>
                               <td style="border:none;" ></td>
                                <?php   } ?>
                    </tr>

                    <?php for ($i=0; $i < count($worker_list) ; $i++) { 
                        
                        $month_holiday = Worker::getMonthHoliday($worker_list[$i]["id"],$_GET["year"]."-".$_GET["month"]);
                        $month_absense = Worker::getMonthAbsense($worker_list[$i]["id"],$_GET["year"]."-".$_GET["month"]);
                        
                        
                        ?>
                       
                    
                    <tr >
                        
                        <td><?=$worker_list[$i]["firstname"] ?> <?=$worker_list[$i]["lastname"] ?></td>
                        <!-- Add tasks for each day of the month -->
                        <?php   for ($day = 1; $day <= $day_in_month ; $day++) {
                            $date1  = \DateTime::createFromFormat($format, $day . "-" . $_GET["month"] . "-" . $_GET["year"]);
                            $day_of_week = $date1->format('D');
                            if(array_search($date1->format("Y-m-d"), array_column($month_holiday, 'date')) != false)
                            {
                                $show_holiday = $month_holiday[array_search($date1->format("Y-m-d"), array_column($month_holiday, 'date'))]["FullDay"];
                            }

                            ?>
                               <td class=" has-text-centered
                               
                               <?= ($date1 < $date2 && !is_int(array_search($date1->format("Y-m-d"), array_column($month_absense, 'date'))) ) ? 'has-background-info' : "" ?> <?= ($day_of_week == "Sun" || $day_of_week == "Sat") ? 'has-background-grey-light' : "" ?>
                                <?=(is_int(array_search($date1->format("Y-m-d"), array_column($month_holiday, 'date'))) && $month_holiday[array_search($date1->format("Y-m-d"), array_column($month_holiday, "date"))]["ID_status"] == 2 ) ? "has-background-warning" : "" ?> 
                                <?=(is_int(array_search($date1->format("Y-m-d"), array_column($month_holiday, 'date'))) && $month_holiday[array_search($date1->format("Y-m-d"), array_column($month_holiday, "date"))]["ID_status"] == 3 ) ? "has-background-danger" : "" ?>
                                <?=(is_int(array_search($date1->format("Y-m-d"), array_column($month_holiday, 'date'))) && $month_holiday[array_search($date1->format("Y-m-d"), array_column($month_holiday, "date"))]["ID_status"] == 1 ) ? "has-background-success" : "" ?>
                                <?=(is_int(array_search($date1->format("Y-m-d"), array_column($month_absense, 'date')))) ? "has-background-primary" : "" ?>
                                
                                ">
                                <div class="span">
                                <?php if(is_int(array_search($date1->format("Y-m-d"), array_column($month_absense, 'date'))) && $month_absense[array_search($date1->format("Y-m-d"), array_column($month_absense, "date"))]["Fullday"] == 0){ ?>

                                    <i class="bi bi-dash-circle-dotted  p-0 m-0 is-size-5 has-text-weight-bold"></i>
                                
                                <?php  }elseif (is_int(array_search($date1->format("Y-m-d"), array_column($month_absense, 'date'))) && $month_absense[array_search($date1->format("Y-m-d"), array_column($month_absense, "date"))]["Fullday"] == 1) {  ?>

                                <i class="bi bi-dash-circle  p-0 m-0  is-size-5 has-text-weight-bold"></i>
                                <?php } ?>

                            <?php if(is_int(array_search($date1->format("Y-m-d"), array_column($month_holiday, 'date')))){ ?>
                                
                                <button class="js-modal-trigger is-clickable mt-3" data-target="modal-js-<?=$day ?>-<?= $i?>">
                                   <i class="bi bi-info-square  p-0 m-0 is-size-5 has-text-weight-bold"></i>
                                    </button>



                                <div id="modal-js-<?=$day?>-<?= $i?>" class="modal">
                                    <div class="modal-background"></div>

                                    <div class="modal-content">
                                        <div class="box">
                                            <div class="columns is-flex is-flex-direction-column">
                                                <div class="column mt-3 has-text-centered is-12">
                                                    <p>Demande de congé du <?= $date1->format("d-m-Y") ?> pour <?= $month_holiday[array_search($date1->format("Y-m-d"), array_column($month_holiday, 'date'))]["FullDay"] ? "une journée." : "une demi journée." ?></p>
                                                </div>
                                                <div class="column has-text-centered is-12">
                                                    <p>Status:
                                                        <?php switch($month_holiday[array_search($date1->format("Y-m-d"), array_column($month_holiday, 'date'))]["ID_status"]){
                                                            case 1:
                                                                echo '<span class="tag is-success">Accepté</span>';
                                                                break;
                                                            case 2:
                                                                echo '<span class="tag is-warning">En attente</span>';
                                                                break;
                                                            case 3:
                                                                echo '<span class="tag is-danger">Refusé</span>';
                                                                break;
                                                        } ?>
                                                    </p>
                                                </div>
                                                <div class="column mt-3 has-text-centered is-12">
                                                    <?php if ($month_holiday[array_search($date1->format("Y-m-d"), array_column($month_holiday, "date"))]["ID_status"] == 2 ) { ?>
                                                    
                                                        <p class="has-text-weight-light has-text-grey is-size-6">Attention, cette action est irréversible, et en cas d'acceptation, elle déduira du temps de congé demandé à l'employé</p>
                                                    <form action="controller-transition.php" method="POST"> 
                                                        <button class="button is-success mx-3 is-outlined" name="ok" value="<?= $month_holiday[array_search($date1->format("Y-m-d"), array_column($month_holiday, 'date'))]["id"] ?>" type="submit">Accepté</button>
                                                        <button class="button is-danger mx-3 is-outlined" name="no" value="<?= $month_holiday[array_search($date1->format("Y-m-d"), array_column($month_holiday, 'date'))]["id"] ?>" type="submit">Refusé</button>
                                                    </form>
                                                        
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        
                                        <!-- Your content -->
                                        </div>
                                    </div>

                                    <button class="modal-close is-large" aria-label="close"></button>
                                    </div>
                                
                            <?php } ?>
                            </td>
                                <?php   } ?>
                    </tr>
                          <?php  } ?>

                    <!-- Add more rows for additional employees -->
                </tbody>
            </table>
                        </div>
                        <script src="../assets/js/calendar.js"></script>