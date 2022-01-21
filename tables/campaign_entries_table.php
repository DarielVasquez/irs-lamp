<?php
require_once '../config/config.php';
require_once '../config/parameters.php';
require_once '../models/report.php';

$report = new Report();

$campaign = isset($_GET['datacampaign'])? $_GET['datacampaign']:NULL;
$startDate = isset($_GET['datastart'])? $_GET['datastart']:NULL;
$endDate = isset($_GET['dataend'])? $_GET['dataend']:NULL;

if($campaign == NULL) {
echo ("<script>location.href = '".base_url."dashboard-index';</script>"); 
}

$report->setCampaign($campaign);
$report->setStartDate($startDate);
$report->setEndDate($endDate);
$reports = $report->getAllCampaigns();

?>
<script src="<?=base_url?>assets/js/demo/datatables-demo.js"></script>

                <div class="card-body">
                    <div class="table-responsive table-hover">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                                    <tr>
                                        <th>Description</th>
                                        <th>Comment</th>
                                        <th>Entry type</th>
                                        <th>Campaign</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th>Creation Date</th>
                                        <th>Created By</th>
                                        <th>Last Modified Date</th>
                                        <th>Last Modified By</th>
                                    </tr>
                                </thead>
                                <tfoot class="thead-light">
                                    <tr>
                                        <th>Description</th>
                                        <th>Comment</th>
                                        <th>Entry type</th>
                                        <th>Campaign</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th>Creation Date</th>
                                        <th>Created By</th>
                                        <th>Last Modified Date</th>
                                        <th>Last Modified By</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $i = 1; foreach($reports as $rep): ?>
                                        <tr>
                                            <td><?=$rep['description']?></td>  
                                            <td><?=$rep['comment']?></td>
                                            <td><?=$rep['entrytype']?></td>                                            
                                            <td><?=$rep['campaign']?></td>
                                            <td><?=$rep['startdate']?></td>
                                            <td><?=$rep['enddate']?></td>
                                            <td><?=$rep['user']?></td>
                                            <td><?=$rep['status']?></td>
                                            <td><?=$rep['createdate']?></td>
                                            <td><?=$rep['createid']?></td>
                                            <td><?=$rep['modifydate']?></td>
                                            <td><?=$rep['modifyid']?></td>
                                        </tr>
                                    <?php $i++; endforeach; ?>    
                                </tbody>
                        </table>
                    </div>
                </div>