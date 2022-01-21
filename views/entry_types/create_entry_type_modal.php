<!-- Create Entry Type Modal-->
<div class="modal fade" id="createEntryTypeModal" tabindex="-1" role="dialog" aria-labelledby="createEntryTypeLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <h5 class="modal-title" id="createEntryTypeLabel">Add New Entry Type</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <!--Body-->
            <form action="<?=base_url?>entry_types-create" method="POST"> <!-- class="user"-->
                <div class="modal-body d-flex justify-content-center">Create a new Entry Type.</div> 
                <div class="container-fluid">                                  
                    <div class="form-group row ml-4 mr-4 pb-1">
                            <label for="entryTypeName">Entry Type Name:</label>
                            <input type="text" class="form-control form-control-user" name="entryTypeName"
                                placeholder="Ejemplo...">
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