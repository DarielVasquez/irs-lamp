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
?>

<form action="<?=base_url?>campaigns-delete" method="POST">
    <div class="container-fluid">   Are you sure you want to delete the existing Campaign?                               
        <div class="form-group row ml-4 mr-4 pb-1">
            <input type="hidden" value="<?=$id?>" name="id" />                     
        </div>
        
        <?php $log = $cam->campaignname."-".$cam->locationid."-".$cam->lobid."-".$cam->comment; ?>
        <input type="hidden" value="<?=$log?>" name="log" />
        <input type="submit" value="Delete" class="btn btn-primary" />
    </div>
</form>
