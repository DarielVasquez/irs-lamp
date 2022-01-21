<?php
require_once '../../config/config.php';
require_once '../../config/parameters.php';
require_once '../../models/campaign.php';
require_once '../../models/entry_type.php';
require_once '../../models/status.php';
require_once '../../models/entry.php';

$entry = new Entry();

$id = isset($_GET['dataid'])? $_GET['dataid']:NULL;

if($id == NULL) {
echo ("<script>location.href = '".base_url."entries-tables';</script>"); 
}

$entry->setId($id);
$ent = $entry->getOne();
?>

<form action="<?=base_url?>entries-delete" method="POST">
    <div class="container-fluid">   Are you sure you want to delete the existing Entry?                               
        <div class="form-group row ml-4 mr-4 pb-1">
            <input type="hidden" value="<?=$id?>" name="id" />                     
        </div>

        <?php $log = $ent->description."-".$ent->comment."-".$ent->entrytypeid."-".$ent->campaignid."-".$ent->startdate."-".$ent->enddate."-".$ent->userid."-".$ent->statusid; ?>
        <input type="hidden" value="<?=$log?>" name="log" />
        <input type="submit" value="Delete" class="btn btn-primary" />
    </div>
</form>
