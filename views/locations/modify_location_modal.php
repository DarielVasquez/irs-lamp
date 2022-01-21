<!-- Modify Location Modal-->
<div class="modal fade" id="modifyLocationModal" tabindex="-1" role="dialog" aria-labelledby="modifyLocationLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <h5 class="modal-title" id="modifyLocationLabel">Modify Location</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body d-flex justify-content-center">Modify existing Location.</div> 
            <div class="container-fluid">                                  
                <form > <!-- class="user"-->
                    <div class="form-group row ml-4 mr-4 pb-1">
                            <label for="locationName">Location Name:</label>
                            <input type="text" class="form-control form-control-user" id="locationName"
                                placeholder="Ejemplo...">
                    </div>
                </form>                
            </div>
            
            <!--Footer-->
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?=base_url?>locations-tables">Save</a>
            </div>
        </div>
    </div>
</div>