<?php
require_once '../config/config.php';
require_once '../config/parameters.php';
require_once '../models/event.php';

$event = new Event();

$issue = isset($_GET['dataissue']) ? $_GET['dataissue'] : false;

if($issue == NULL) {
    echo ("<script>location.href = '".base_url."dashboard-index';</script>"); 
}

$event->setIssue_id($issue);
$issues = $event->getSelectIssues();
?>

        <label for="issues">Choose an issue:</label>
        <select name="issues" class="form-control form-control-user" >
            <?php while ($iss = $issues->fetch_object()): ?>
                <option  value="<?= $iss->id ?>" id="selectissue">
                    <?= $iss->name ?>
                    <?php $target = $iss->target?>
                </option>
            <?php endwhile; ?>
        </select>
        <input type="hidden" value="<?=$target?>" name="target" id="target"/>