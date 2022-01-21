                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800 "><?php echo $_SESSION['fullname'];?>'s Profile</h1>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
                <!-- Create Event Modal-->
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <!--Body-->            
                            <div class="modal-body">
                                <form action="<?=base_url?>profile-modify" method="POST"> <!-- class="user"-->
                                    <div class="container-fluid">      
                                        <div class="d-flex justify-content-center py-2">
                                            <h5>Modify Profile Settings</h5>
                                        </div>

                                        <div class="d-flex justify-content-center py-1">
                                            <?php if(isset($_SESSION['profile']) && $_SESSION['profile'] == 'failed'): ?>
                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    <strong>There has been an error and the request couldn't be completed</strong>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>  
                                            <?php elseif(isset($_SESSION['profile']) && $_SESSION['profile'] == 'modified'): ?>
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">	
                                                    <strong>The profile has been updated</strong>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            <?php endif; ?>
                                            <?php Utils::deleteSession('profile'); ?>
                                        </div>

                                        <div class="form-group row ml-4 mr-4 pb-1">
                                                <label for="fullName">Full Name:</label>
                                                <input type="text" class="form-control form-control-user" name="fullName" value="<?=$_SESSION['fullname']?>" >
                                        </div>

                                        <div class="form-group row ml-4 mr-4 pb-1">
                                                <label for="userName">User Name:</label>
                                                <input type="text" class="form-control form-control-user" name="userName" value="<?=$_SESSION['username']?>" >
                                        </div>

                                        <div class="form-group row ml-4 mr-4 pb-1">
                                                <label for="userPass">Password:</label>
                                                <input type="password" id="myInput" class="form-control form-control-user" name="userPass" value="<?=$_SESSION['pass']?>" >
                                        </div> 

                                        <div class="form-group row ml-4 mr-4 pb-4">
                                        <input type="checkbox" onclick="passFunction()" /> Show Password
                                        </div> 

                                        <?php $log = $_SESSION['fullname']."-".$_SESSION['username']; ?>
                                        <input type="hidden" value="<?=$log?>" name="log" />
                                        <input type="hidden" value="<?=$_SESSION['id']?>" name="id" />
                                        <div class="modal-footer">
                                            <input type="submit" value="Save" class="btn btn-primary"/>                                   
                                        </div>                          
                                    </div>
                                </form>
                            </div>                      
                        </div>
                    </div>

<script>
function passFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
