<?php
require_once 'config/config.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'models/user.php';

$user = new User();

$id = isset($_GET['dataid'])? $_GET['dataid']:NULL;

if($id == NULL) {
echo ("<script>location.href = '".base_url."users-tables';</script>"); 
}

$user->setId($id);
$use = $user->getOne();
?>

<form action="<?=base_url?>users-modify" method="POST">
<div class="d-flex justify-content-center">Modify existing User.</div> 
    <div class="container-fluid">                                  
        <form > <!-- class="user"-->
            <div class="form-group row ml-4 mr-4 pb-1">
                    <label for="fullName">Full Name:</label>
                    <input type="text" class="form-control form-control-user" name="fullName" value="<?=$use->fullname?>" >
            </div>

            <div class="form-group row ml-4 mr-4 pb-1">
                    <label for="userName">User Name:</label>
                    <input type="text" class="form-control form-control-user" name="userName" value="<?=$use->user?>" >
            </div>

            <div class="form-group row ml-4 mr-4 pb-1">
                    <label for="userPass">Password:</label>
                    <input type="password" class="form-control form-control-user" name="userPass" value="<?=$use->pass?>" >
            </div> 

            <input type="hidden" value="<?=$id?>" name="id" />
            <input type="submit" value="Modify" class="btn btn-primary" />   
    </div>
</form> 