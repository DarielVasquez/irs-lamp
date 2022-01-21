<!-- Create Status Modal-->
<div class="modal fade" id="createStatusModal" tabindex="-1" role="dialog" aria-labelledby="createStatusLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <h5 class="modal-title" id="createStatusLabel">Add New Status</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <!--Body-->
            <form action="<?=base_url?>status-create" method="POST"> <!-- class="user"-->
                <div class="modal-body d-flex justify-content-center">Create a new Status.</div> 
                <div class="container-fluid">                                  
                    <div class="form-group row ml-4 mr-4 pb-1">
                            <label for="statusName">Status Name:</label>
                            <input type="text" class="form-control form-control-user" name="statusName"
                                placeholder="Ejemplo...">
                    </div>

                    <div class="form-group row ml-4 mr-4 pb-4">
                        <label for="description">Description:</label>
                        <textarea name="description" class="form-control form-control-user"></textarea>
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