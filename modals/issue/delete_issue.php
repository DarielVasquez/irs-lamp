<?php
require_once '../../config/config.php';
require_once '../../config/parameters.php';
require_once '../../models/issue.php';
require_once '../../models/issue_type.php';

$issue = new Issue();

$id = isset($_GET['dataid'])? $_GET['dataid']:NULL;

if($id == NULL) {
echo ("<script>location.href = '".base_url."issues-tables';</script>"); 
}

$issue->setId($id);
$iss = $issue->getOne();
?>

<form action="<?=base_url?>issues-delete" method="POST">
    <div class="container-fluid">   Are you sure you want to delete the existing Issue?                               
        <div class="form-group row ml-4 mr-4 pb-1">
            <input type="hidden" value="<?=$id?>" name="id" />                     
        </div>

        <?php $log = $iss->name."-".$iss->typeissue."-".$iss->target; ?>
        <input type="hidden" value="<?=$log?>" name="log" />
        <input type="submit" value="Delete" class="btn btn-primary" />
    </div>
</form>
