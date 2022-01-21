<?php
require_once '../../config/config.php';
require_once '../../config/parameters.php';
require_once '../../models/status.php';

$status = new Status();

$id = isset($_GET['dataid'])? $_GET['dataid']:NULL;

if($id == NULL) {
echo ("<script>location.href = '".base_url."status-tables';</script>"); 
}

$status->setId($id);
$sta = $status->getOne();
?>

<form action="<?=base_url?>status-delete" method="POST">
    <div class="container-fluid">  Are you sure you want to delete the existing Status?                               
        <div class="form-group row ml-4 mr-4 pb-1">
            <input type="hidden" value="<?=$id?>" name="id" />                     
        </div>

        <?php $log = $sta->name."-".$sta->description; ?>
        <input type="hidden" value="<?=$log?>" name="log" />
        <input type="submit" value="Delete" class="btn btn-primary" />
    </div>
</form>