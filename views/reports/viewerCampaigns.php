            <!-- Content Row -->

            <div class="mb-4 d-flex align-content-sm-center">
                <h1 class="h3 mb-2 text-gray-800">Generated Reports for <?php echo $startDate;?> - <?php echo $endDate;?></h1>
            </div>                                   

            <!--Table-->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Data Table of Campaign Entries</h6>
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary">Campaign</button>
                                <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" 
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu">
                                    <?php $i = 1; foreach($campaigns as $cam): ?>
                                        <a class="dropdown-item tableCampaigns" datacampaign="<?php echo $cam['id'];?>" 
                                        datastart="<?php echo $startDate;?>" dataend="<?php echo $endDate;?>">
                                        Generate Report for <?=$cam['campaignname']?>        
                                        </a>           
                                    <?php $i++; endforeach; ?>                       
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tableCampaignsData">
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
                    </div>
                </div>