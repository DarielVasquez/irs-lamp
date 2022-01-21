                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Issues</h1>

                    <!-- DataTable-->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Table of All Issues</h6>
                        </div>

                        <div class="d-flex justify-content-center py-1">
                            <?php if(isset($_SESSION['issue']) && $_SESSION['issue'] == 'failed'): ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>There has been an error and the request couldn't be completed</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php elseif(isset($_SESSION['issue']) && $_SESSION['issue'] == 'created'): ?>	
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>The issue has been properly created</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>    
                            <?php elseif(isset($_SESSION['issue']) && $_SESSION['issue'] == 'modified'): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">	
                                    <strong>The issue has been properly modified</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php elseif(isset($_SESSION['issue']) && $_SESSION['issue'] == 'deleted'): ?>	
                                <div class="alert alert-success alert-dismissible fade show" role="alert">	
                                    <strong>The issue has been deleted permanently</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php elseif(isset($_SESSION['issue']) && $_SESSION['issue'] == 'foreign'): ?>	
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">	
                                    <strong>The issue can NOT be deleted because it is still in use</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <?php Utils::deleteSession('issue'); ?>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive table-hover">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Issue Name</th>
                                            <th>Issue Type</th>
                                            <th>Target Time (Minutes)</th>
                                            <th>Creation Date</th>
                                            <th>Created By</th>
                                            <th>Last Modified Date</th>
                                            <th>Last Modified By</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-light">
                                        <tr>
                                            <th>Issue Name</th>
                                            <th>Issue Type</th>
                                            <th>Target Time (Minutes)</th>
                                            <th>Creation Date</th>
                                            <th>Created By</th>
                                            <th>Last Modified Date</th>
                                            <th>Last Modified By</th>
                                            <th>Options</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i = 1; foreach($issues as $iss): ?>
                                            <tr>
                                                                                               
                                                <td><?=$iss['name']?></td>
                                                <td><?=$iss['type']?></td>
                                                <td><?=$iss['target']?></td>
                                                <td><?=$iss['createdate']?></td>
                                                <td><?=$iss['createid']?></td>
                                                <td><?=$iss['modifydate']?></td>
                                                <td><?=$iss['modifyid']?></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" >
                                                        <button class="btn btn-warning shadow-sm modifyIssue" dataid="<?php echo $iss['id'];?>">
                                                        <i class="fas fa-pen fa-sm text-white-50"></i> 
                                                        Modify</button>
                                                        <button class="btn btn-danger shadow-sm deleteIssue" dataid="<?php echo $iss['id'];?>">
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
                        <a href="#" data-toggle="modal" data-target="#createIssueModal" class="btn btn-success shadow-sm"><i
                                                        class="fas fa-plus fa-sm text-white-50"></i> Create</a>
                    </div>

                    <!-- Create Issue Modal-->
                    <div class="modal fade" id="createIssueModal" tabindex="-1" role="dialog" aria-labelledby="createIssueLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <!--Header-->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createIssueLabel">Add New Issue</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>

                                <!--Body-->            
                                <div class="modal-body">
                                    <form action="<?=base_url?>issues-create" method="POST"> <!-- class="user"-->
                                    <div class="d-flex justify-content-center">Create a new issue.</div>
                                        <div class="container-fluid">                                                  
                                            <div class="form-group row ml-4 mr-4 pb-1">
                                                    <label for="issueName">Issue Name:</label>
                                                    <input type="text" required class="form-control form-control-user" name="issueName"
                                                        placeholder="Ejemplo...">
                                            </div>

                                            <div class="form-group row ml-4 mr-4 pb-1">
                                            <?php $issue_types = Utils::showIssueTypes(); ?>
                                                <label for="issue_type">Choose an Issue Type:</label>
                                                <select name="issue_type" class="form-control form-control-user">
                                                    <?php while ($type = $issue_types->fetch_object()): ?>
                                                        <option value="<?= $type->id ?>">
                                                            <?= $type->name ?>
                                                        </option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>

                                            <div class="form-group row ml-4 mr-4 pb-4">
                                                    <label for="target">Target Time (in minutes):</label>
                                                    <input type="number" min="1" max="1440" required class="form-control form-control-user" name="target">
                                            </div>

                                            <input type="submit" value="Save" class="btn btn-primary"/>
                                        </div>
                                    </form>
                                </div> 
                                
                                <!--Footer-->
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>                                    
                                </div>                            
                            </div>
                        </div>
                    </div>

                    <!-- Modify Issue Modal-->
                    <div class="modal fade" id="modifyIssueModal" tabindex="-1" role="dialog" aria-labelledby="modifyIssueLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <!--Header-->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modifyIssueLabel">Modify Issue</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div> 

                                <!--Body-->
                                <div class="modal-body modifyIssueData"></div> 

                                <!--Footer-->
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Issue Modal-->
                    <div class="modal fade" id="deleteIssueModal" tabindex="-1" role="dialog" aria-labelledby="deleteIssueLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <!--Header-->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteIssueLabel">Delete Issue</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>

                                <!--Body-->
                                <div class="modal-body deleteIssueData"></div> 
                                
                                <!--Footer-->
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div> 

                    