<!-- Delete Location Modal-->
<div class="modal fade" id="deleteLocationModal" tabindex="-1" role="dialog" aria-labellelobby="deleteLocationLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <h5 class="modal-title" id="deleteLocationLabel">Delete Location</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body d-flex justify-content-center">Are you sure you want to delete the existing Location?</div> 
            
            <!--Footer-->
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?=base_url?>locations-tables">Yes</a>
            </div>
        </div>
    </div>
</div>