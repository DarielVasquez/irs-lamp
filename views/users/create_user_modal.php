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
            <form action="<?=base_url?>users-create" method="POST"> <!-- class="user"-->
                <div class="modal-body d-flex justify-content-center">Create a new User.</div> 
                <div class="container-fluid">                                  
                    <div class="form-group row ml-4 mr-4 pb-1">
                            <label for="fullName">Full Name:</label>
                            <input type="text" class="form-control form-control-user" name="fullName"
                                placeholder="Ejemplo...">
                    </div>

                    <div class="form-group row ml-4 mr-4 pb-1">
                            <label for="userName">User Name:</label>
                            <input type="text" class="form-control form-control-user" name="userName"
                                placeholder="Ejemplo...">
                    </div>

                    <div class="form-group row ml-4 mr-4 pb-1">
                            <label for="userPass">Password:</label>
                            <input type="password" class="form-control form-control-user" name="userPass">
                    </div>               
                </div>
            
                <!--Footer-->
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" value="Save" class="btn btn-primary"/>
                </div>
            </form>
        </div>
    </div>
</div>