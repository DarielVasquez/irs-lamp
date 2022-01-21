<?php
require_once '../../config/config.php';
require_once '../../config/parameters.php';
require_once '../../models/location.php';

$location = new Location();

$id = isset($_GET['dataid'])? $_GET['dataid']:NULL;

if($id == NULL) {
echo ("<script>location.href = '".base_url."locations-tables';</script>"); 
}

$location->setId($id);
$loc = $location->getOne();
?>

<form action="<?=base_url?>locations-delete" method="POST">
    <div class="container-fluid">   Are you sure you want to delete the existing Location?                               
        <div class="form-group row ml-4 mr-4 pb-1">
            <input type="hidden" value="<?=$id?>" name="id" />                     
        </div>

        <?php $log = $loc->name; ?>
        <input type="hidden" value="<?=$log?>" name="log" />
        <input type="submit" value="Delete" class="btn btn-primary" />
    </div>
</form>
