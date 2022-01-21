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

$issue_type = new Issue_type();
$issue_types = $issue_type->getAll();
?>

<form action="<?=base_url?>issues-modify" method="POST">
<div class="d-flex justify-content-center">Modify an existing Issue.</div> 
    <div class="container-fluid">                                  
        <div class="form-group row ml-4 mr-4 pb-1">
                <label for="issueName">Issue Name:</label>                           
                <input type="text" class="form-control form-control-user" value="<?=$iss->name?>" 
                name="issueName"/>                            
        </div>

        <div class="form-group row ml-4 mr-4 pb-1">
            <label for="issue_type">Choose an issue type:</label>
            <select name="issue_type" class="form-control form-control-user">
            <?php while ($type = $issue_types->fetch_object()): ?>
                <option value="<?=$type->id?>" <?=isset($iss) && is_object($iss) && $type->id == $iss->typeissue ? 'selected' : ''; ?>>
                        <?=$type->name?>
                    </option>
            <?php endwhile; ?>
            </select>
        </div>

        <div class="form-group row ml-4 mr-4 pb-4">
                <label for="target">Target Time (in minutes):</label>
                <input type="number" min="1" max="1440" required class="form-control form-control-user" name="target" value="<?=$iss->target?>">
        </div>

        <?php $log = $iss->name."-".$iss->typeissue."-".$iss->target; ?>
        <input type="hidden" value="<?=$log?>" name="log" />
        <input type="hidden" value="<?=$id?>" name="id" />
        <input type="submit" value="Modify" class="btn btn-primary" />            

    </div>
</form>
