<?php
require_once 'config/config.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'models/lob.php';

$lobs = new LoB();

$id = isset($_GET['dataid'])? $_GET['dataid']:NULL;

if($id == NULL) {
echo ("<script>location.href = '".base_url."campaigns-tables';</script>"); 
}

$lobs->setId($id);
$lob = $lobs->getOne();
?>

<form action="<?=base_url?>lob-delete" method="POST">
    <div class="container-fluid">  Are you sure you want to delete the existing Line of Business?           
        <div class="form-group row ml-4 mr-4 pb-1">
            <input type="hidden" value="<?=$id?>" name="id" />                     
        </div>

        <input type="submit" value="Delete" class="btn btn-primary" />
    </div>
</form>

