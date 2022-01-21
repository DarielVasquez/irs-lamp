<?php
require_once '../config/config.php';
require_once '../config/parameters.php';
require_once '../models/event.php';
$event = new Event();
$alerts = $event->getAlerts();

$numrows = mysqli_num_rows($alerts);
?>

                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" id="alertsDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell fa-fw"></i>
                                    <!-- Counter - Alerts -->
                                    <?php if($numrows>0): 
                                        echo "<span class='badge badge-danger badge-counter'>".$numrows."</span>"; 
                                        endif;?>
                                </a>
                                <!-- Dropdown - Alerts -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">
                                        Notifications
                                    </h6>
                                        <?php if($numrows==0): 
                                                echo "<a class='dropdown-item d-flex align-items-center text-secondary'>Nothing to see here...</a>";
                                            endif;?>
                                            <?php $i = 1; foreach($alerts as $ale): ?>
                                                <?php 
                                                    if($ale["slastatus"]=='Out of Time'):
                                                        echo "<a class='dropdown-item d-flex align-items-center bg-warning text-light'>".
                                                        $ale["subject"].": ".$ale["issue"]." issue of ".$ale["campaign"].", last modified by ".
                                                        $ale["user"]." was completed out of time.</a>";
                                                    elseif($ale["slastatus"]=='Not Completed'):
                                                        echo "<a class='dropdown-item d-flex align-items-center bg-danger text-light'>".
                                                        $ale["subject"].": ".$ale["issue"]." issue of ".$ale["campaign"].", last modified by ".
                                                        $ale["user"]." was not completed on time.</a>";                                                     
                                                    endif;
                                                ?>
                                            <?php $i++; endforeach; ?>                                       
                                            <a class="dropdown-item text-center small bg-light text-gray-500">Last 5 minutes</a>
                                </div>
                            </li>