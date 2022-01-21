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

<form action="<?=base_url?>issue_types-modify" method="POST">
<div class="d-flex justify-content-center">Modify existing Issue Type.</div> 
    <div class="container-fluid">                                  
        <form > <!-- class="user"-->
            <div class="form-group row ml-4 mr-4 pb-4">
                    <label for="issueTypeName">Issue Type Name:</label>
                    <input type="text" class="form-control form-control-user" name="issueTypeName" value="<?=$type->name?>">
            </div>

            <?php $log = $type->name; ?>
            <input type="hidden" value="<?=$log?>" name="log" />
            <input type="hidden" value="<?=$id?>" name="id" />
            <input type="submit" value="Modify" class="btn btn-primary" />       
    </div>
</form>

