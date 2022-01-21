                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Entries</h1>

                    <!-- DataTable-->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Table of All Entries</h6>
                        </div>

                        <div class="d-flex justify-content-center py-1">
                            <?php if(isset($_SESSION['entry']) && $_SESSION['entry'] == 'failed'): ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>There has been an error and the request couldn't be completed</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php elseif(isset($_SESSION['entry']) && $_SESSION['entry'] == 'created'): ?>	
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>The entry has been properly created</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>    
                            <?php elseif(isset($_SESSION['entry']) && $_SESSION['entry'] == 'modified'): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">	
                                    <strong>The entry has been properly modified</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php elseif(isset($_SESSION['entry']) && $_SESSION['entry'] == 'deleted'): ?>	
                                <div class="alert alert-success alert-dismissible fade show" role="alert">	
                                    <strong>The entry has been deleted permanently</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <?php Utils::deleteSession('entry'); ?>
                        </div>

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
                                            <th>Options</th>
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
                                            <th>Options</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i = 1; foreach($entries as $ent): ?>
                                            <tr>
                                                <td><?=$ent['description']?></td>  
                                                <td><?=$ent['comment']?></td>
                                                <td><?=$ent['entrytype']?></td>                                            
                                                <td><?=$ent['campaign']?></td>
                                                <td><?=$ent['startdate']?></td>
                                                <td><?=$ent['enddate']?></td>
                                                <td><?=$ent['user']?></td>
                                                <td><?=$ent['status']?></td>
                                                <td><?=$ent['createdate']?></td>
                                                <td><?=$ent['createid']?></td>
                                                <td><?=$ent['modifydate']?></td>
                                                <td><?=$ent['modifyid']?></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" >
                                                        <button class="btn btn-warning shadow-sm modifyEntry" dataid="<?php echo $ent['id'];?>">
                                                        <i class="fas fa-pen fa-sm text-white-50"></i> 
                                                        Modify</button>
                                                        <button class="btn btn-danger shadow-sm deleteEntry" dataid="<?php echo $ent['id'];?>">
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
                        <a href="#" data-toggle="modal" data-target="#createEntryModal" class="btn btn-success shadow-sm"><i
                                                        class="fas fa-plus fa-sm text-white-50"></i> Create</a>
                    </div>

                    <!-- Create Entry Modal-->
                    <div class="modal fade" id="createEntryModal" tabindex="-1" role="dialog" aria-labelledby="createEntryLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <!--Header-->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createEntryLabel">Add New Entry</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>

                                <!--Body-->            
                                <div class="modal-body">
                                    <form action="<?=base_url?>entries-create" method="POST"> <!-- class="user"-->
                                    <div class="d-flex justify-content-center">Create a new Entry.</div>
                                        <div class="container-fluid">                                                  
                                            <div class="form-group row ml-4 mr-4 pb-1">
                                                    <label for="description">Description:</label>
                                                    <input type="text" required class="form-control form-control-user" name="description"
                                                        placeholder="Ejemplo...">
                                            </div>

                                            <div class="form-group row ml-4 mr-4 pb-1">
                                            <?php $entry_types = Utils::showEntryTypes(); ?>
                                                <label for="entry_types">Choose an entry type:</label>
                                                <select name="entry_types" class="form-control form-control-user">
                                                    <?php while ($type = $entry_types->fetch_object()): ?>
                                                        <option value="<?= $type->id ?>">
                                                            <?= $type->entryname ?>
                                                        </option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>

                                            <div class="form-group row ml-4 mr-4 pb-1">
                                            <?php $campaigns = Utils::showCampaigns(); ?>
                                                <label for="campaigns">Choose a campaign:</label>
                                                <select name="campaigns" class="form-control form-control-user">
                                                    <?php while ($cam = $campaigns->fetch_object()): ?>
                                                        <option value="<?= $cam->id ?>">
                                                            <?= $cam->campaignname ?>
                                                        </option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>

                                            <div class="form-group row ml-4 mr-4 pb-1">
                                                    <label for="users">User:</label>
                                                    <input disabled type="text" class="form-control form-control-user disabled" 
                                                        placeholder="<?=$_SESSION['username']?>">
                                                        <input type="hidden" value="<?=$_SESSION['id']?>" name="users" />
                                            </div>

                                            <div class="form-group row ml-4 mr-4 pb-1">
                                            <?php $status = Utils::showStatus(); ?>
                                                <label for="status">Choose a status:</label>
                                                <select name="status" class="form-control form-control-user">
                                                    <?php while ($sta = $status->fetch_object()): ?>
                                                        <option value="<?= $sta->id ?>">
                                                            <?= $sta->name ?>
                                                        </option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>

                                            <div class="form-group row ml-4 mr-4 pb-1">
                                                <div class="col-sm-0 mb-3 mb-sm-1">
                                                <label for="startDate">Start Date:</label>
                                                    <input type="date" required class="form-control form-control-user" name="startDate">
                                                </div>
                                                <div class="col-sm-0">
                                                <label for="endDate">End Date:</label>
                                                    <input type="date" required class="form-control form-control-user" name="endDate">
                                                </div>
                                            </div>

                                            <div class="form-group row ml-4 mr-4 pb-4">
                                                <label for="comment">Comment:</label>
                                                <textarea name="comment" required class="form-control form-control-user"></textarea>
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

                    <!-- Modify Entry Modal-->
                    <div class="modal fade" id="modifyEntryModal" tabindex="-1" role="dialog" aria-labelledby="modifyEntryLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <!--Header-->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modifyEntryLabel">Modify Entry</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div> 

                                <!--Body-->
                                <div class="modal-body modifyEntryData"></div> 

                                <!--Footer-->
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Entry Modal-->
                    <div class="modal fade" id="deleteEntryModal" tabindex="-1" role="dialog" aria-labelledby="deleteEntryLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <!--Header-->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteEntryLabel">Delete Entry</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>

                                <!--Body-->
                                <div class="modal-body deleteEntryData"></div> 
                                
                                <!--Footer-->
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div> 