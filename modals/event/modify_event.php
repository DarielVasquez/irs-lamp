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
$typeissue = $eve->typeissueid;

$event->setIssue_id($typeissue);
$issues = $event->getSelectIssues();

$issue_type = new Issue_type();
$issue_types = $issue_type->getAll();
$campaign = new Campaign();
$campaigns = $campaign->getAll();
$stat = new Status();
$status = $stat->getAll();
?>

<form action="<?=base_url?>events-modify" method="POST">
<div class="d-flex justify-content-center">Modify an existing Event.</div> 
    <div class="container-fluid">                                  
        <div class="form-group row ml-4 mr-4 pb-1">
                <label for="subject">Subject:</label>
                <input type="text" required class="form-control form-control-user" name="subject"
                value="<?=$eve->subject?>">
        </div>

        <div class="form-group row ml-4 mr-4 pb-1">
                <label for="description">Description:</label>
                <input type="text" required class="form-control form-control-user" name="description"
                value="<?=$eve->description?>">
        </div>

        <div class="form-group row ml-4 mr-4 pb-1">
            <label for="issue_types">Choose an issue type:</label>
            <select name="issue_types" required class="form-control form-control-user" id="issue_types" onchange="myFunction(this.value)">
                <?php $i = 1; foreach($issue_types as $type): ?>
                    <option value="<?= $type['id'] ?>" <?=isset($eve) && is_object($eve) && $type['id'] == $eve->typeissueid ? 'selected' : ''; ?>>
                        <?= $type['name'] ?>
                        <?php $typeissue = $type['id'];?>
                    </option>
                <?php $i++; endforeach; ?>
            </select>
        </div>

        <div class="form-group row ml-4 mr-4 pb-1 selectIssueData">
            <label for="issues">Choose an issue:</label>
            <select name="issues" class="form-control form-control-user" >
                <?php while ($iss = $issues->fetch_object()): ?>
                    <option value="<?= $iss->id ?>" <?=isset($eve) && is_object($eve) && $iss->id == $eve->issueid ? 'selected' : ''; ?>>
                        <?= $iss->name ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="form-group row ml-4 mr-4 pb-1">
            <label for="campaigns">Choose a campaign:</label>
            <select name="campaigns" class="form-control form-control-user">
                <?php while ($cam = $campaigns->fetch_object()): ?>
                    <option value="<?= $cam->id ?>" <?=isset($eve) && is_object($eve) && $cam->id == $eve->campaignid ? 'selected' : ''; ?>>
                        <?= $cam->campaignname ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="form-group row ml-4 mr-4 pb-1">
            <label for="status">Choose a status:</label>
            <select name="status" class="form-control form-control-user">
                <?php while ($sta = $status->fetch_object()): ?>
                    <option value="<?= $sta->id ?>" <?=isset($eve) && is_object($eve) && $sta->id == $eve->statusid ? 'selected' : ''; ?>>
                        <?= $sta->name ?>
                        <?php $statusname = $sta->name ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="form-group row ml-4 mr-4 pb-1">
                <label for="agentUser">Agent User:</label>
                <input type="text" required class="form-control form-control-user" name="agentUser"
                value="<?=$eve->agentuser?>">
        </div>

        <div class="form-group row ml-4 mr-4 pb-4">
                <label for="phone">Phone:</label>
                <input type="tel" required class="form-control form-control-user" name="phone"
                value="<?=$eve->phone?>" pattern="[0-9]{4}-[0-9]{4}">
        </div>
        
        <?php $log = $eve->subject."-".$eve->description."-".$eve->typeissueid."-".$eve->issueid."-".$eve->campaignid."-".$eve->agentuser."-".$eve->userid."-".$eve->phone."-".$eve->statusid."-".$eve->target."-".$eve->slastatus; ?>
        <input type="hidden" value="<?=$log?>" name="log" />
        <input type="hidden" value="<?=$statusname?>" name="statusname" />
        <input type="hidden" value="<?=$id?>" name="id" />
        <input type="submit" value="Modify" class="btn btn-primary" />            

    </div>
</form>
