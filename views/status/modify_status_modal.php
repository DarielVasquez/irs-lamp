<!-- Modify Status Modal-->
<div class="modal fade" id="modifyStatusModal" tabindex="-1" role="dialog" aria-labelledby="modifyStatusLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <h5 class="modal-title" id="modifyStatusLabel">Modify Status</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body d-flex justify-content-center">Modify existing Status.</div> 
            <div class="container-fluid">                                  
                <form > <!-- class="user"-->
                    <div class="form-group row ml-4 mr-4 pb-1">
                            <label for="statusName">Status Name:</label>
                            <input type="text" class="form-control form-control-user" id="statusName"
                                placeholder="Ejemplo...">
                    </div>

                    <div class="form-group row ml-4 mr-4 pb-4">
                        <label for="Description">Description:</label>
                        <textarea name="Description" class="form-control form-control-user"></textarea>
                    </div>
                </form>                
            </div>
            
            <!--Footer-->
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?=base_url?>status-tables">Save</a>
            </div>
        </div>
    </div>
</div>