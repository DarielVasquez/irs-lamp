<!-- Modify Campaign Modal-->
<div class="modal fade" id="modifyCampaignModal" tabindex="-1" role="dialog" aria-labelledby="modifyCampaignLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <h5 class="modal-title" id="modifyCampaignLabel">Modify Campaign</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div> 

            <!--Body-->
            <form action="<?=base_url?>campaigns-modify" method="POST"> <!-- class="user" -->
                <div class="modal-body d-flex justify-content-center">Modify existing Campaign.</div> 
                <div class="container-fluid">                                  
                    <div class="form-group row ml-4 mr-4 pb-1">
                            <label for="campaignName">Campaign Name:</label>
                            <input type="text" class="form-control form-control-user" name="campaignName"
                                value="<?=isset($cam) && is_object($cam) ? $cam->campaignname: ''; ?>">
                    </div>

                    <div class="form-group row ml-4 mr-4 pb-1">
                    <?php $locations = Utils::showLocations(); ?>
                        <label for="location">Choose a location:</label>
                        <select name="location" class="form-control form-control-user">
                            <?php while ($loc = $locations->fetch_object()): ?>
                                <option value="<?= $loc->id ?>" <?=isset($cam) && is_object($cam) && $loc->id == $cam->locationid ? 'selected' : ''; ?>>
                                    <?= $loc->name ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    
                    <div class="form-group row ml-4 mr-4 pb-1">
                    <?php $lobs = Utils::showLoBs(); ?>
                        <label for="lob">Choose a line of business:</label>
                        <select name="lob" class="form-control form-control-user">
                            <?php while ($lob = $lobs->fetch_object()): ?>
                                <option value="<?= $lob->id ?>" <?=isset($cam) && is_object($cam) && $lob->id == $cam->lobid ? 'selected' : ''; ?>>
                                    <?= $lob->type ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    
                    <div class="form-group row ml-4 mr-4 pb-4">
                        <label for="comment">Comment:</label>
                        <textarea name="comment" class="form-control form-control-user"><?=isset($cam) && is_object($cam) ? $cam->comment : ''; ?></textarea>
                    </div>              
                </div>
                
                <!--Footer-->
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" value="Save" class="btn btn-primary"/>
                </div>
            </form> 
        </div>
    </div>
</div>