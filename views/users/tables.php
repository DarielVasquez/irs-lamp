                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Users</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Table of All Users</h6>
                        </div>

                        <div class="d-flex justify-content-center py-1">
                            <?php if(isset($_SESSION['userError']) && $_SESSION['userError'] == 'failed'): ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>There has been an error and the request couldn't be completed</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php elseif(isset($_SESSION['userError']) && $_SESSION['userError'] == 'created'): ?>	
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>The user has been properly created</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>    
                            <?php elseif(isset($_SESSION['userError']) && $_SESSION['userError'] == 'modified'): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">	
                                    <strong>The user has been properly modified</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php elseif(isset($_SESSION['userError']) && $_SESSION['userError'] == 'deleted'): ?>	
                                <div class="alert alert-success alert-dismissible fade show" role="alert">	
                                    <strong>The user has been deleted permanently</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php elseif(isset($_SESSION['userError']) && $_SESSION['userError'] == 'foreign'): ?>	
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">	
                                    <strong>The user can NOT be deleted because it is still in use</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <?php Utils::deleteSession('userError'); ?>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive table-hover">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Full Name</th>
                                            <th>User</th>
                                            <th>Password</th>
                                            <th>Creation Date</th>
                                            <th>Created By</th>
                                            <th>Last Modified Date</th>
                                            <th>Last Modified By</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="thead-light">
                                        <tr>
                                            <th>Full Name</th>
                                            <th>User</th>
                                            <th>Password</th>
                                            <th>Creation Date</th>
                                            <th>Created By</th>
                                            <th>Last Modified Date</th>
                                            <th>Last Modified By</th>
                                            <th>Options</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i = 1; foreach($users as $use): ?>
                                            <tr>                                                
                                                <td><?=$use['fullname']?></td>
                                                <td><?=$use['user']?></td>
                                                <td><?=$use['pass']?></td>
                                                <td><?=$use['createdate']?></td>
                                                <td><?=$use['createid']?></td>
                                                <td><?=$use['modifydate']?></td>
                                                <td><?=$use['modifyid']?></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                    <button class="btn btn-warning shadow-sm modifyUser" dataid="<?php echo $use['id'];?>">
                                                        <i class="fas fa-pen fa-sm text-white-50"></i> 
                                                        Modify</button>
                                                        <button class="btn btn-danger shadow-sm deleteUser" dataid="<?php echo $use['id'];?>">
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
                        <a href="#" data-toggle="modal" data-target="#createUserModal" class="btn btn-success shadow-sm"><i
                                                        class="fas fa-plus fa-sm text-white-50"></i> Create</a>
                    </div>

                    <!-- Create User Modal-->
                    <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <!--Header-->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createUserLabel">Add New User</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>

                                <!--Body-->
                                <div class="modal-body">
                                    <form action="<?=base_url?>users-create" method="POST"> <!-- class="user"-->
                                        <div class="d-flex justify-content-center">Create a new User.</div>
                                        <div class="container-fluid">                 
                                            <div class="form-group row ml-4 mr-4 pb-1">
                                                    <label for="fullName">Full Name:</label>
                                                    <input type="text" required class="form-control form-control-user" name="fullName"
                                                        placeholder="Ejemplo...">
                                            </div>

                                            <div class="form-group row ml-4 mr-4 pb-1">
                                                    <label for="userName">User Name:</label>
                                                    <input type="text" required class="form-control form-control-user" name="userName"
                                                        placeholder="Ejemplo...">
                                            </div>

                                            <div class="form-group row ml-4 mr-4 pb-4">
                                                    <label for="userPass">Password:</label>
                                                    <input type="password" required class="form-control form-control-user" name="userPass">
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

                    <!-- Modify User Modal-->
                    <div class="modal fade" id="modifyUserModal" tabindex="-1" role="dialog" aria-labelledby="modifyUserLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <!--Header-->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modifyUserLabel">Modify User</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>

                                <!--Body-->
                                <div class="modal-body modifyUserData"></div> 
                                
                                <!--Footer-->
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delete User Modal-->
                    <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <!--Header-->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteUserLabel">Delete User</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>

                                <!--Body-->
                                <div class="modal-body deleteUserData"></div> 
                                
                                <!--Footer-->
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>