                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Entry Types</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Table of All Entry Types</h6>
                        </div>

                        <div class="d-flex justify-content-center py-1">
                            <?php if(isset($_SESSION['entry_type']) && $_SESSION['entry_type'] == 'failed'): ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>There has been an error and the request couldn't be completed</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php elseif(isset($_SESSION['entry_type']) && $_SESSION['entry_type'] == 'created'): ?>	
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>The entry type has been properly created</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>    
                            <?php elseif(isset($_SESSION['entry_type']) && $_SESSION['entry_type'] == 'modified'): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">	
                                    <strong>The entry type has been properly modified</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php elseif(isset($_SESSION['entry_type']) && $_SESSION['entry_type'] == 'deleted'): ?>	
                                <div class="alert alert-success alert-dismissible fade show" role="alert">	
                                    <strong>The entry type has been deleted permanently</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php elseif(isset($_SESSION['entry_type']) && $_SESSION['entry_type'] == 'foreign'): ?>	
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">	
                                    <strong>The entry type can NOT be deleted because it is still in use</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <?php Utils::deleteSession('entry_type'); ?>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive table-hover">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Entry Type Name</th>
                                            <th>Creation Date</th>
                                            <th>Created By</th>
                                            <th>Last Modified Date</th>
                                            <th>Last Modified By</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-light">
                                        <tr>
                                            <th>Entry Type Name</th>
                                            <th>Creation Date</th>
                                            <th>Created By</th>
                                            <th>Last Modified Date</th>
                                            <th>Last Modified By</th>
                                            <th>Options</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i = 1; foreach($entry_types as $type): ?>
                                            <tr>
                                                <td><?=$type['entryname']?></td>
                                                <td><?=$type['createdate']?></td>
                                                <td><?=$type['createid']?></td>
                                                <td><?=$type['modifydate']?></td>
                                                <td><?=$type['modifyid']?></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-warning shadow-sm modifyEntryType" dataid="<?php echo $type['id'];?>">
                                                        <i class="fas fa-pen fa-sm text-white-50"></i> 
                                                        Modify</button>
                                                        <button class="btn btn-danger shadow-sm deleteEntryType" dataid="<?php echo $type['id'];?>">
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
                        <a href="#" data-toggle="modal" data-target="#createEntryTypeModal" class="btn btn-success shadow-sm"><i
                                                        class="fas fa-plus fa-sm text-white-50"></i> Create</a>
                    </div>

                    <!-- Create Entry Type Modal-->
                    <div class="modal fade" id="createEntryTypeModal" tabindex="-1" role="dialog" aria-labelledby="createEntryTypeLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <!--Header-->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createEntryTypeLabel">Add New Entry Type</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>

                                <!--Body-->
                                <div class="modal-body">
                                    <form action="<?=base_url?>entry_types-create" method="POST"> <!-- class="user"-->
                                    <div class="d-flex justify-content-center">Create a new Entry Type.</div> 
                                        <div class="container-fluid">                                  
                                            <div class="form-group row ml-4 mr-4 pb-4">
                                                    <label for="entryTypeName">Entry Type Name:</label>
                                                    <input type="text" required class="form-control form-control-user" name="entryTypeName"
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

                    <!-- Modify Entry Type Modal-->
                    <div class="modal fade" id="modifyEntryTypeModal" tabindex="-1" role="dialog" aria-labelledby="modifyEntryTypeLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <!--Header-->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modifyEntryTypeLabel">Modify Entry Type</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>

                                <!--Body-->
                                <div class="modal-body modifyEntryTypeData"></div> 
                                
                                <!--Footer-->
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Entry Type Modal-->
                    <div class="modal fade" id="deleteEntryTypeModal" tabindex="-1" role="dialog" aria-labelledby="deleteEntryTypeLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <!--Header-->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteEntryTypeLabel">Delete Entry Type</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>

                                <!--Body-->
                                <div class="modal-body d-flex justify-content-center deleteEntryTypeData"></div> 
                                
                                <!--Footer-->
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>