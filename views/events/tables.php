                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Events</h1>

                    <!-- DataTable-->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Table of All Events</h6>
                        </div>

                        <div class="d-flex justify-content-center py-1">
                            <?php if(isset($_SESSION['event']) && $_SESSION['event'] == 'failed'): ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>There has been an error and the request couldn't be completed</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php elseif(isset($_SESSION['event']) && $_SESSION['event'] == 'created'): ?>	
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>The event has been properly created</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>    
                            <?php elseif(isset($_SESSION['event']) && $_SESSION['event'] == 'modified'): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">	
                                    <strong>The event has been properly modified</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php elseif(isset($_SESSION['event']) && $_SESSION['event'] == 'deleted'): ?>	
                                <div class="alert alert-success alert-dismissible fade show" role="alert">	
                                    <strong>The event has been deleted permanently</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <?php Utils::deleteSession('event'); ?>
                        </div>

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
                                            <th>Options</th>
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
                                            <th>Options</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i = 1; foreach($events as $eve): ?>
                                            <tr>
                                                <td><?=$eve['subject']?></td>  
                                                <td><?=$eve['description']?></td>
                                                <td><?=$eve['issue']?></td>                                            
                                                <td><?=$eve['typeissue']?></td>
                                                <td><?=$eve['campaign']?></td>
                                                <td><?=$eve['user']?></td>
                                                <td><?=$eve['agentuser']?></td>
                                                <td><?=$eve['phone']?></td>
                                                <td><?=$eve['status']?></td>
                                                <td><?=$eve['createdate']?></td>
                                                <td><?=$eve['target']?></td>
                                                <td><?=$eve['slastatus']?></td>
                                                <td><?=$eve['createid']?></td>
                                                <td><?=$eve['modifydate']?></td>
                                                <td><?=$eve['modifyid']?></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" >
                                                        <button class="btn btn-warning shadow-sm modifyEvent" dataid="<?php echo $eve['id'];?>">
                                                        <i class="fas fa-pen fa-sm text-white-50"></i> 
                                                        Modify</button>
                                                        <button class="btn btn-danger shadow-sm deleteEvent" dataid="<?php echo $eve['id'];?>">
                                                        <i class="fas fa-trash fa-sm text-white-50"></i> 
                                                        Delete</button>                                                                                                                         
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php $i++; endforeach; ?>    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a class="btn btn-success shadow-sm" href="<?=base_url?>events-add"><i
                            class="fas fa-plus fa-sm text-white-50"></i> Create</a>
                    </div>

                    <!-- Modify Event Modal-->
                    <div class="modal fade" id="modifyEventModal" tabindex="-1" role="dialog" aria-labelledby="modifyEventLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <!--Header-->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modifyEventLabel">Modify Event</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div> 

                                <!--Body-->
                                <div class="modal-body modifyEventData"></div> 

                                <!--Footer-->
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Event Modal-->
                    <div class="modal fade" id="deleteEventModal" tabindex="-1" role="dialog" aria-labelledby="deleteEventLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <!--Header-->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteEventLabel">Delete Event</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>

                                <!--Body-->
                                <div class="modal-body deleteEventData"></div> 
                                
                                <!--Footer-->
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div> 