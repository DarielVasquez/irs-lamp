<?php
require_once '../../config/config.php';
require_once '../../config/parameters.php';
require_once '../../models/issue_type.php';

$issue_type = new Issue_type();

$id = isset($_GET['dataid'])? $_GET['dataid']:NULL;

if($id == NULL) {
echo ("<script>location.href = '".base_url."issue_types-tables';</script>"); 
}

$issue_type->setId($id);
$type = $issue_type->getOne();
?>

<form action="<?=base_url?>issue_types-delete" method="POST">
    <div class="container-fluid">   Are you sure you want to delete the existing Issue Type?                            
        <div class="form-group row ml-4 mr-4 pb-1">
            <input type="hidden" value="<?=$id?>" name="id" />                     
        </div>

        <?php $log = $type->name; ?>
        <input type="hidden" value="<?=$log?>" name="log" />
        <input type="submit" value="Delete" class="btn btn-primary" />
    </div>
</form>
