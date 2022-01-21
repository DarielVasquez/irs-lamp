                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Campaigns</h1>

                    <!-- DataTable-->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Table of All Campaigns</h6>
                        </div>

                        <div class="d-flex justify-content-center py-1">
                            <?php if(isset($_SESSION['campaign']) && $_SESSION['campaign'] == 'failed'): ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>There has been an error and the request couldn't be completed</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php elseif(isset($_SESSION['campaign']) && $_SESSION['campaign'] == 'created'): ?>	
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>The campaign has been properly created</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>    
                            <?php elseif(isset($_SESSION['campaign']) && $_SESSION['campaign'] == 'modified'): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">	
                                    <strong>The campaign has been properly modified</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php elseif(isset($_SESSION['campaign']) && $_SESSION['campaign'] == 'deleted'): ?>	
                                <div class="alert alert-success alert-dismissible fade show" role="alert">	
                                    <strong>The campaign has been deleted permanently</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php elseif(isset($_SESSION['campaign']) && $_SESSION['campaign'] == 'foreign'): ?>	
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">	
                                    <strong>The campaign can NOT be deleted because it is still in use</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <?php Utils::deleteSession('campaign'); ?>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive table-hover">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Campaign Name</th>
                                            <th>Location</th>
                                            <th>Line of Business</th>
                                            <th>Comment</th>
                                            <th>Creation Date</th>
                                            <th>Created By</th>
                                            <th>Last Modified Date</th>
                                            <th>Last Modified By</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-light">
                                        <tr>
                                            <th>Campaign Name</th>
                                            <th>Location</th>
                                            <th>Line of Business</th>
                                            <th>Comment</th>
                                            <th>Creation Date</th>
                                            <th>Created By</th>
                                            <th>Last Modified Date</th>
                                            <th>Last Modified By</th>
                                            <th>Options</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i = 1; foreach($campaigns as $cam): ?>
                                            <tr>
                                                                                               
                                                <td><?=$cam['campaignname']?></td>
                                                <td><?=$cam['locationid']?></td>
                                                <td><?=$cam['lobid']?></td>
                                                <td><?=$cam['comment']?></td>
                                                <td><?=$cam['createdate']?></td>
                                                <td><?=$cam['createid']?></td>
                                                <td><?=$cam['modifydate']?></td>
                                                <td><?=$cam['modifyid']?></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" >
                                                        <button class="btn btn-warning shadow-sm modifyCampaign" dataid="<?php echo $cam['id'];?>">
                                                        <i class="fas fa-pen fa-sm text-white-50"></i> 
                                                        Modify</button>
                                                        <button class="btn btn-danger shadow-sm deleteCampaign" dataid="<?php echo $cam['id'];?>">
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
                        <a href="#" data-toggle="modal" data-target="#createCampaignModal" class="btn btn-success shadow-sm"><i
                                                        class="fas fa-plus fa-sm text-white-50"></i> Create</a>
                    </div>

                    <!-- Create Campaign Modal-->
                    <div class="modal fade" id="createCampaignModal" tabindex="-1" role="dialog" aria-labelledby="createCampaignLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <!--Header-->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createCampaignLabel">Add New Campaign</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>

                                <!--Body-->            
                                <div class="modal-body">
                                    <form action="<?=base_url?>campaigns-create" method="POST"> <!-- class="user"-->
                                    <div class="d-flex justify-content-center">Create a new Campaign.</div>
                                        <div class="container-fluid">                                                  
                                            <div class="form-group row ml-4 mr-4 pb-1">
                                                    <label for="campaignName">Campaign Name:</label>
                                                    <input type="text" required class="form-control form-control-user" name="campaignName"
                                                        placeholder="Ejemplo...">
                                            </div>

                                            <div class="form-group row ml-4 mr-4 pb-1">
                                            <?php $locations = Utils::showLocations(); ?>
                                                <label for="location">Choose a location:</label>
                                                <select name="location" class="form-control form-control-user">
                                                    <?php while ($loc = $locations->fetch_object()): ?>
                                                        <option value="<?= $loc->id ?>">
                                                            <?= $loc->name ?>
                                                        </option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>

                                            <div class="form-group row ml-4 mr-4 pb-1">
                                            <?php $lobs = Utils::showLoBs(); ?>
                                                <label for="lob">Choose a line of business:</label>
                                                <select name="lob" class="form-control form-control-user">
                                                    <?php while ($lob = $lobs->fetch_object()): ?>
                                                        <option value="<?= $lob->id ?>">
                                                            <?= $lob->type ?>
                                                        </option>
                                                    <?php endwhile; ?>
                                                </select>
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

                    <!-- Modify Campaign Modal-->
                    <div class="modal fade" id="modifyCampaignModal" tabindex="-1" role="dialog" aria-labelledby="modifyCampaignLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <!--Header-->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modifyCampaignLabel">Modify Campaign</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div> 

                                <!--Body-->
                                <div class="modal-body modifyCampaignData"></div> 

                                <!--Footer-->
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Campaign Modal-->
                    <div class="modal fade" id="deleteCampaignModal" tabindex="-1" role="dialog" aria-labelledby="deleteCampaignLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <!--Header-->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteCampaignLabel">Delete Campaign</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>

                                <!--Body-->
                                <div class="modal-body deleteCampaignData"></div> 
                                
                                <!--Footer-->
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div> 

                    