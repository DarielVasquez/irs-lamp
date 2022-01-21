<!-- Delete Entry Type Modal-->
<div class="modal fade" id="deleteEntryTypeModal" tabindex="-1" role="dialog" aria-labelledby="deleteEntryTypeLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <h5 class="modal-title" id="deleteEntryTypeLabel">Delete Entry Type</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body d-flex justify-content-center">Are you sure you want to delete the existing Entry Type?</div> 
            
            <!--Footer-->
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?=base_url?>entry_types-tables">Yes</a>
            </div>
        </div>
    </div>
</div>