<?php
require_once '../config/config.php';
require_once '../config/parameters.php';
require_once '../models/report.php';

$report = new Report();

$user = isset($_GET['datauser'])? $_GET['datauser']:NULL;
$startDate = isset($_GET['datastart'])? $_GET['datastart']:NULL;
$endDate = isset($_GET['dataend'])? $_GET['dataend']:NULL;

if($user == NULL) {
echo ("<script>location.href = '".base_url."dashboard-index';</script>"); 
}

$report->setUser($user);
$report->setStartDate($startDate);
$report->setEndDate($endDate);
$reports = $report->getAllUsers();

?>
<script src="<?=base_url?>assets/js/demo/datatables-demo.js"></script>

                <div class="card-body">
                    <div class="table-responsive table-hover">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Subject</th>
                                    <th>Description</th>
                                    <th>Issue</th>
                                    <th>Issue Type</th>
                                    <th>Campaign</th>
                                    <th>User</th>
                                    <th>Agent User</th>
                                    <th>Phone Number</th>
                                    <th>Status</th>
                                    <th>Creation Date</th>
                                    <th>Estimated Target Time (Minutes)</th>
                                    <th>SLA Status</th>
                                    <th>Created By</th>
                                    <th>Last Modified Date</th>
                                    <th>Last Modified By</th>
                                </tr>
                            </thead>
                            <tfoot class="thead-light">
                                <tr>
                                    <th>Subject</th>
                                    <th>Description</th>
                                    <th>Issue</th>
                                    <th>Issue Type</th>
                                    <th>Campaign</th>
                                    <th>User</th>
                                    <th>Agent User</th>
                                    <th>Phone Number</th>
                                    <th>Status</th>
                                    <th>Creation Date</th>
                                    <th>Estimated Target Time (Minutes)</th>
                                    <th>SLA Status</th>
                                    <th>Created By</th>
                                    <th>Last Modified Date</th>
                                    <th>Last Modified By</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $i = 1; foreach($reports as $rep): ?>
                                    <tr>
                                        <td><?=$rep['subject']?></td>  
                                        <td><?=$rep['description']?></td>
                                        <td><?=$rep['nameissue']?></td>                                            
                                        <td><?=$rep['typeissue']?></td>
                                        <td><?=$rep['campaign']?></td>
                                        <td><?=$rep['user']?></td>
                                        <td><?=$rep['agentuser']?></td>
                                        <td><?=$rep['phone']?></td>
                                        <td><?=$rep['status']?></td>
                                        <td><?=$rep['createdate']?></td>
                                        <td><?=$rep['target']?></td>
                                        <td><?=$rep['slastatus']?></td>
                                        <td><?=$rep['createid']?></td>
                                        <td><?=$rep['modifydate']?></td>
                                        <td><?=$rep['modifyid']?></td>
                                    </tr>
                                <?php $i++; endforeach; ?>    
                            </tbody>
                        </table>
                    </div>
                </div>