<?php
require_once 'config/config.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'models/location.php';

$location = new Location();

$id = isset($_GET['dataid'])? $_GET['dataid']:NULL;

if($id == NULL) {
echo ("<script>location.href = '".base_url."locations-tables';</script>"); 
}

$location->setId($id);
$loc = $location->getOne();
?>

<form action="<?=base_url?>locations-modify" method="POST">
<div class=" d-flex justify-content-center">Modify existing Location.</div> 
    <div class="container-fluid">                                  
        <div class="form-group row ml-4 mr-4 pb-1">
            <label for="locationName">Location Name:</label>
            <input type="text" class="form-control form-control-user" name="locationName" value="<?=$loc->name?>">
        </div>

        <input type="hidden" value="<?=$id?>" name="id" />
        <input type="submit" value="Modify" class="btn btn-primary" />    
    </div>
</form>  