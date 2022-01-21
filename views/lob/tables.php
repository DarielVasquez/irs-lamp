                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Line of Business</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Table of All Line of Business</h6>
                        </div>

                        <div class="d-flex justify-content-center py-1">
                            <?php if(isset($_SESSION['lob']) && $_SESSION['lob'] == 'failed'): ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>There has been an error and the request couldn't be completed</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php elseif(isset($_SESSION['lob']) && $_SESSION['lob'] == 'created'): ?>	
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>The line of business has been properly created</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>    
                            <?php elseif(isset($_SESSION['lob']) && $_SESSION['lob'] == 'modified'): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">	
                                    <strong>The line of business has been properly modified</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php elseif(isset($_SESSION['lob']) && $_SESSION['lob'] == 'deleted'): ?>	
                                <div class="alert alert-success alert-dismissible fade show" role="alert">	
                                    <strong>The line of business has been deleted permanently</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php elseif(isset($_SESSION['lob']) && $_SESSION['lob'] == 'foreign'): ?>	
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">	
                                    <strong>The line of business can NOT be deleted because it is still in use</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <?php Utils::deleteSession('lob'); ?>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive table-hover">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>LoB Name</th>
                                            <th>Description</th>
                                            <th>Creation Date</th>
                                            <th>Created By</th>
                                            <th>Last Modified Date</th>
                                            <th>Last Modified By</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-light">
                                        <tr>
                                            <th>LoB Name</th>
                                            <th>Description</th>
                                            <th>Creation Date</th>
                                            <th>Created By</th>
                                            <th>Last Modified Date</th>
                                            <th>Last Modified By</th>
                                            <th>Options</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i = 1; foreach($lobs as $lob): ?>
                                            <tr>                                                
                                                <td><?=$lob['type']?></td>
                                                <td><?=$lob['description']?></td>
                                                <td><?=$lob['createdate']?></td>
                                                <td><?=$lob['createid']?></td>
                                                <td><?=$lob['modifydate']?></td>
                                                <td><?=$lob['modifyid']?></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-warning shadow-sm modifyLob" dataid="<?php echo $lob['id'];?>">
                                                        <i class="fas fa-pen fa-sm text-white-50"></i> 
                                                        Modify</button>                                                   
                                                        <button class="btn btn-danger shadow-sm deleteLob" dataid="<?php echo $lob['id'];?>">
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
                        <a href="#" data-toggle="modal" data-target="#createLobModal" class="btn btn-success shadow-sm"><i
                                                        class="fas fa-plus fa-sm text-white-50"></i> Create</a>
                    </div>

                    <!-- Create LoB Modal-->
                    <div class="modal fade" id="createLobModal" tabindex="-1" role="dialog" aria-labelledby="createLobLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <!--Header-->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createLobLabel">Add New Line of Business</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>

                                <!--Body-->
                                <div class="modal-body ">
                                    <form action="<?=base_url?>lob-create" method="POST"> <!-- class="user"-->  
                                    <div class="d-flex justify-content-center">Create a new Line of Business.</div> 
                                        <div class="container-fluid">                                                              
                                            <div class="form-group row ml-4 mr-4 pb-1">
                                                    <label for="lobName">Line of Business Name:</label>
                                                    <input type="text" required class="form-control form-control-user" name="lobType"
                                                        placeholder="Ejemplo...">
                                            </div>

                                            <div class="form-group row ml-4 mr-4 pb-4">
                                                <label for="description">Description:</label>
                                                <textarea name="description" required class="form-control form-control-user"></textarea>
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

                    <!-- Modify LoB Modal-->
                    <div class="modal fade" id="modifyLobModal" tabindex="-1" role="dialog" aria-labelledby="modifyLobLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <!--Header-->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modifyLobLabel">Modify Line of Business</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>

                                <!--Body-->
                                <div class="modal-body modifyLobData"></div>
                                
                                <!--Footer-->
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delete LoB Modal-->
                    <div class="modal fade" id="deleteLobModal" tabindex="-1" role="dialog" aria-labelledby="deleteLobLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <!--Header-->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteLobLabel">Delete Line of Business</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>

                                <!--Body-->
                                <div class="modal-body d-flex justify-content-center deleteLobData"></div>
                                
                                <!--Footer-->
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>