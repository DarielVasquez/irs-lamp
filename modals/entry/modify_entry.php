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

$entry_type = new Entry_type();
$entry_types = $entry_type->getAll();
$campaign = new Campaign();
$campaigns = $campaign->getAll();
$stat = new Status();
$status = $stat->getAll();
?>

<form action="<?=base_url?>entries-modify" method="POST">
<div class="d-flex justify-content-center">Modify an existing Entry.</div> 
    <div class="container-fluid">                                  
        <div class="form-group row ml-4 mr-4 pb-1">
                <label for="description">Description:</label>                           
                <input type="text" class="form-control form-control-user" value="<?=$ent->description?>" 
                name="description"/>                            
        </div>
        
        <div class="form-group row ml-4 mr-4 pb-1">
            <label for="entry_types">Choose an entry type:</label>
            <select name="entry_types" class="form-control form-control-user">
                <?php while ($type = $entry_types->fetch_object()): ?>
                    <option value="<?= $type->id ?>" <?=isset($ent) && is_object($ent) && $type->id == $ent->entrytypeid ? 'selected' : ''; ?>>
                        <?= $type->entryname ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="form-group row ml-4 mr-4 pb-1">
            <label for="campaigns">Choose a campaign:</label>
            <select name="campaigns" class="form-control form-control-user">
                <?php while ($cam = $campaigns->fetch_object()): ?>
                    <option value="<?= $cam->id ?>" <?=isset($ent) && is_object($ent) && $cam->id == $ent->campaignid ? 'selected' : ''; ?>>
                        <?= $cam->campaignname ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="form-group row ml-4 mr-4 pb-1">
            <label for="status">Choose a status:</label>
            <select name="status" class="form-control form-control-user">
                <?php while ($sta = $status->fetch_object()): ?>
                    <option value="<?= $sta->id ?>" <?=isset($ent) && is_object($ent) && $sta->id == $ent->statusid ? 'selected' : ''; ?>>
                        <?= $sta->name ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="form-group row ml-4 mr-4 pb-1">
            <div class="col-sm-0 mb-3 mb-sm-1">
            <label for="startDate">Start Date:</label>
                <input type="date" required class="form-control form-control-user" name="startDate" value="<?=$ent->startdate?>">
            </div>
            <div class="col-sm-0">
            <label for="endDate">End Date:</label>
                <input type="date" required class="form-control form-control-user" name="endDate" value="<?=$ent->enddate?>">
            </div>
        </div>
        
        <div class="form-group row ml-4 mr-4 pb-4">
            <label for="comment">Comment:</label>
            <textarea name="comment" class="form-control form-control-user "><?=$ent->comment?></textarea>
        </div>
        
        <?php $log = $ent->description."-".$ent->comment."-".$ent->entrytypeid."-".$ent->campaignid."-".$ent->startdate."-".$ent->enddate."-".$ent->userid."-".$ent->statusid; ?>
        <input type="hidden" value="<?=$log?>" name="log" />
        <input type="hidden" value="<?=$id?>" name="id" />
        <input type="submit" value="Modify" class="btn btn-primary" />            

    </div>
</form>
