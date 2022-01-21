<!-- Modify LoB Modal-->
<div class="modal fade" id="modifyLobModal" tabindex="-1" role="dialog" aria-labelledby="modifyLobLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <h5 class="modal-title" id="modifyLobLabel">Modify Line of Business</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body d-flex justify-content-center">Modify existing Line of Business.</div> 
            <div class="container-fluid">                                  
                <form > <!-- class="user"-->
                    <div class="form-group row ml-4 mr-4 pb-1">
                            <label for="lobName">Line of Business Name:</label>
                            <input type="text" class="form-control form-control-user" id="lobName"
                                placeholder="Ejemplo...">
                    </div>

                    <div class="form-group row ml-4 mr-4 pb-4">
                        <label for="description">Description:</label>
                        <textarea name="description" class="form-control form-control-user"></textarea>
                    </div>
                </form>                
            </div>
            
            <!--Footer-->
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?=base_url?>lob-tables">Save</a>
            </div>
        </div>
    </div>
</div>