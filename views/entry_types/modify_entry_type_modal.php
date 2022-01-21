<!-- Modify Entry Type Modal-->
<div class="modal fade" id="modifyEntryTypeModal" tabindex="-1" role="dialog" aria-labelledby="modifyEntryTypeLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <h5 class="modal-title" id="modifyEntryTypeLabel">Modify Entry Type</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body d-flex justify-content-center">Modify existing Entry Type.</div> 
            <div class="container-fluid">                                  
                <form > <!-- class="user"-->
                    <div class="form-group row ml-4 mr-4 pb-1">
                            <label for="entryTypeName">Entry Type Name:</label>
                            <input type="text" class="form-control form-control-user" id="entryTypeName"
                                placeholder="Ejemplo...">
                    </div>
                </form>                
            </div>
            
            <!--Footer-->
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?=base_url?>entry_types-tables">Save</a>
            </div>
        </div>
    </div>
</div>