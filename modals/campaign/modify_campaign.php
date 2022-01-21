<?php
require_once '../../config/config.php';
require_once '../../config/parameters.php';
require_once '../../models/campaign.php';
require_once '../../models/location.php';
require_once '../../models/lob.php';

$campaign = new Campaign();

$id = isset($_GET['dataid'])? $_GET['dataid']:NULL;

if($id == NULL) {
echo ("<script>location.href = '".base_url."campaigns-tables';</script>"); 
}

$campaign->setId($id);
$cam = $campaign->getOne();

$location = new Location();
$locations = $location->getAll();
$lob = new LoB();
$lobs = $lob->getAll();
?>

<form action="<?=base_url?>campaigns-modify" method="POST">
<div class="d-flex justify-content-center">Modify an existing Campaign.</div> 
    <div class="container-fluid">      
        <div class="form-group row ml-4 mr-4 pb-1">
                <label for="campaignName">Campaign Name:</label>                           
                <input type="text" class="form-control form-control-user" value="<?=$cam->campaignname?>" 
                name="campaignName"/>                            
        </div>

        <div class="form-group row ml-4 mr-4 pb-1">
            <label for="location">Choose a location:</label>
            <select name="location" class="form-control form-control-user">
            <?php while ($loc = $locations->fetch_object()): ?>
                <option value="<?=$loc->id?>" <?=isset($cam) && is_object($cam) && $loc->id == $cam->locationid ? 'selected' : ''; ?>>
                        <?=$loc->name?>
                    </option>
            <?php endwhile; ?>
            </select>
        </div>
        
        <div class="form-group row ml-4 mr-4 pb-1">
            <label for="lob">Choose a line of business:</label>
            <select name="lob" class="form-control form-control-user">
            <?php while ($lob = $lobs->fetch_object()): ?>
                <option value="<?=$lob->id?>" <?=isset($cam) && is_object($cam) && $lob->id == $cam->lobid ? 'selected' : ''; ?>>
                        <?=$lob->type?>
                </option>
            <?php endwhile; ?>
            </select>
        </div>
        
        <div class="form-group row ml-4 mr-4 pb-4">
            <label for="comment">Comment:</label>
            <textarea name="comment" class="form-control form-control-user "><?=$cam->comment?></textarea>
        </div>
        
        <?php $log = $cam->campaignname."-".$cam->locationid."-".$cam->lobid."-".$cam->comment; ?>
        <input type="hidden" value="<?=$log?>" name="log" />
        <input type="hidden" value="<?=$id?>" name="id" />
        <input type="submit" value="Modify" class="btn btn-primary" />            

    </div>
</form>
