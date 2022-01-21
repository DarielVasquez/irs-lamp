                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Issue Types</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Table of All Issue Types</h6>
                        </div>

                        <div class="d-flex justify-content-center py-1">
                            <?php if(isset($_SESSION['issue_type']) && $_SESSION['issue_type'] == 'failed'): ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>There has been an error and the request couldn't be completed</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php elseif(isset($_SESSION['issue_type']) && $_SESSION['issue_type'] == 'created'): ?>	
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>The issue type has been properly created</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>    
                            <?php elseif(isset($_SESSION['issue_type']) && $_SESSION['issue_type'] == 'modified'): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">	
                                    <strong>The issue type has been properly modified</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php elseif(isset($_SESSION['issue_type']) && $_SESSION['issue_type'] == 'deleted'): ?>	
                                <div class="alert alert-success alert-dismissible fade show" role="alert">	
                                    <strong>The issue type has been deleted permanently</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php elseif(isset($_SESSION['issue_type']) && $_SESSION['issue_type'] == 'foreign'): ?>	
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">	
                                    <strong>The issue type can NOT be deleted because it is still in use</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <?php Utils::deleteSession('issue_type'); ?>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive table-hover">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Issue Type Name</th>
                                            <th>Creation Date</th>
                                            <th>Created By</th>
                                            <th>Last Modified Date</th>
                                            <th>Last Modified By</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-light">
                                        <tr>
                                            <th>Issue Type Name</th>
                                            <th>Creation Date</th>
                                            <th>Created By</th>
                                            <th>Last Modified Date</th>
                                            <th>Last Modified By</th>
                                            <th>Options</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i = 1; foreach($issue_types as $type): ?>
                                            <tr>                                                
                                                <td><?=$type['name']?></td>
                                                <td><?=$type['createdate']?></td>
                                                <td><?=$type['createid']?></td>
                                                <td><?=$type['modifydate']?></td>
                                                <td><?=$type['modifyid']?></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                    <button class="btn btn-warning shadow-sm modifyIssueType" dataid="<?php echo $type['id'];?>">
                                                        <i class="fas fa-pen fa-sm text-white-50"></i> 
                                                        Modify</button>
                                                        <button class="btn btn-danger shadow-sm deleteIssueType" dataid="<?php echo $type['id'];?>">
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
                        <a href="#" data-toggle="modal" data-target="#createIssueTypeModal" class="btn btn-success shadow-sm"><i
                                                        class="fas fa-plus fa-sm text-white-50"></i> Create</a>
                    </div>

                    <!-- Create Issue Types Modal-->
                    <div class="modal fade" id="createIssueTypeModal" tabindex="-1" role="dialog" aria-labelledby="createIssueTypeLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <!--Header-->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createIssueTypeLabel">Add New Issue Type</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>

                                <!--Body-->
                                <div class="modal-body"> 
                                    <form action="<?=base_url?>issue_types-create" method="POST"> <!-- class="user"-->
                                    <div class="modal-body d-flex justify-content-center">Create a new Issue Type.</div> 
                                        <div class="container-fluid">                                  
                                            <div class="form-group row ml-4 mr-4 pb-4">
                                                    <label for="issueTypeName">Issue Type Name:</label>
                                                    <input type="text" required class="form-control form-control-user" name="issueTypeName"
                                                        placeholder="Ejemplo...">
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

                    <!-- Modify Issue Type Modal-->
                    <div class="modal fade" id="modifyIssueTypeModal" tabindex="-1" role="dialog" aria-labelledby="modifyIssueTypeLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <!--Header-->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modifyIssueTypeLabel">Modify Issue Type</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>

                                <!--Body-->
                                <div class="modal-body modifyIssueTypeData"></div> 
                                
                                <!--Footer-->
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Issue Type Modal-->
                    <div class="modal fade" id="deleteIssueTypeModal" tabindex="-1" role="dialog" aria-labellelobby="deleteIssueTypeLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <!--Header-->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteIssueTypeLabel">Delete Issue Type</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>

                                <!--Body-->
                                <div class="modal-body deleteIssueTypeData"></div> 
                                
                                <!--Footer-->
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>