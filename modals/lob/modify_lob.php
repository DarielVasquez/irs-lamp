<?php
require_once '../../config/config.php';
require_once '../../config/parameters.php';
require_once '../../models/lob.php';

$lob = new LoB();

$id = isset($_GET['dataid'])? $_GET['dataid']:NULL;

if($id == NULL) {
echo ("<script>location.href = '".base_url."lob-tables';</script>"); 
}

$lob->setId($id);
$l = $lob->getOne();
?>

<form action="<?=base_url?>lob-modify" method="POST">
    <div class="modal-body d-flex justify-content-center">Modify existing Line of Business.</div> 
    <div class="container-fluid">                                  
        <div class="form-group row ml-4 mr-4 pb-1">
                <label for="lobType">Line of Business Name:</label>
                <input type="text" class="form-control form-control-user" name="lobType" value="<?=$l->type?>">
        </div>

        <div class="form-group row ml-4 mr-4 pb-4">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control form-control-user"><?=$l->description?></textarea>
        </div>

        <?php $log = $l->type."-".$l->description; ?>
        <input type="hidden" value="<?=$log?>" name="log" />
        <input type="hidden" value="<?=$id?>" name="id" />
        <input type="submit" value="Modify" class="btn btn-primary" />                
    </div>   
</form>        