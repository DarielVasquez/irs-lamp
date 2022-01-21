<?php
require_once '../../config/config.php';
require_once '../../config/parameters.php';
require_once '../../models/campaign.php';
require_once '../../models/issue_type.php';
require_once '../../models/status.php';
require_once '../../models/event.php';

$event = new Event();

$id = isset($_GET['dataid'])? $_GET['dataid']:NULL;

if($id == NULL) {
echo ("<script>location.href = '".base_url."events-tables';</script>"); 
}

$event->setId($id);
$eve = $event->getOne();
?>

<form action="<?=base_url?>events-delete" method="POST">
    <div class="container-fluid">   Are you sure you want to delete the existing Event?                               
        <div class="form-group row ml-4 mr-4 pb-1">
            <input type="hidden" value="<?=$id?>" name="id" />                     
        </div>

        <?php $log = $eve->subject."-".$eve->description."-".$eve->typeissueid."-".$eve->issueid."-".$eve->campaignid."-".$eve->agentuser."-".$eve->userid."-".$eve->phone."-".$eve->statusid."-".$eve->target."-".$eve->slastatus."-"; ?>
        <input type="hidden" value="<?=$log?>" name="log" />
        <input type="submit" value="Delete" class="btn btn-primary" />
    </div>
</form>
