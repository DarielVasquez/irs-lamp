            <!-- Content Row -->

            <div class="mb-4 d-flex align-content-sm-center">
                <h1 class="h3 mb-2 text-gray-800">Generated Reports for <?php echo $startDate;?> - <?php echo $endDate;?></h1>
            </div>

            <!--Table-->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Data Table of Call Events</h6>
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary">Type of Issue</button>
                                <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" 
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu">
                                    <?php $i = 1; foreach($issue_types as $type): ?>
                                        <a class="dropdown-item tableCalls" dataissue="<?php echo $type['id'];?>" 
                                        datastart="<?php echo $startDate;?>" dataend="<?php echo $endDate;?>">
                                        Generate Report for <?=$type['name']?>        
                                        </a>           
                                    <?php $i++; endforeach; ?>                       
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tableCallsData">
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
                    </div>
                </div>