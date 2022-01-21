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
            <div class="modal-body d-flex justify-content-center">Modify existing User.</div> 
            <div class="container-fluid">                                  
                <form > <!-- class="user"-->
                    <div class="form-group row ml-4 mr-4 pb-1">
                            <label for="fullName">Full Name:</label>
                            <input type="text" class="form-control form-control-user" id="fullName"
                                placeholder="Ejemplo...">
                    </div>

                    <div class="form-group row ml-4 mr-4 pb-1">
                            <label for="userName">User Name:</label>
                            <input type="text" class="form-control form-control-user" id="userName"
                                placeholder="Ejemplo...">
                    </div>

                    <div class="form-group row ml-4 mr-4 pb-1">
                            <label for="userPass">Password:</label>
                            <input type="password" class="form-control form-control-user" id="userPass">
                    </div>
                </form>                
            </div>
            
            <!--Footer-->
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?=base_url?>users-tables">Save</a>
            </div>
        </div>
    </div>
</div>