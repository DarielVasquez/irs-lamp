<?php
require_once 'config/config.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'models/status.php';

$status = new Status();

$id = isset($_GET['dataid'])? $_GET['dataid']:NULL;

if($id == NULL) {
echo ("<script>location.href = '".base_url."status-tables';</script>"); 
}

$status->setId($id);
$sta = $status->getOne();
?>

<form action="<?=base_url?>status-modify" method="POST">
<div class="d-flex justify-content-center">Modify existing Status.</div> 
    <div class="container-fluid">                                  
        <div class="form-group row ml-4 mr-4 pb-1">
                <label for="statusName">Status Name:</label>
                <input type="text" class="form-control form-control-user" name="statusName" value="<?=$sta->name?>">
        </div>

        <div class="form-group row ml-4 mr-4 pb-4">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control form-control-user"><?=$sta->description?></textarea>
        </div>         

        <input type="hidden" value="<?=$id?>" name="id" />
        <input type="submit" value="Modify" class="btn btn-primary" />  
    </div>
</form>