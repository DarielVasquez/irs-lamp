<!-- Create LoB Modal-->
<div class="modal fade" id="createLobModal" tabindex="-1" role="dialog" aria-labelledby="createLobLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <h5 class="modal-title" id="createLobLabel">Add New Line of Business</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <!--Body-->
            <form action="<?=base_url?>lob-create" method="POST"> <!-- class="user"-->
                <div class="modal-body d-flex justify-content-center">Create a new Line of Business.</div> 
                <div class="container-fluid">                                  
                        <div class="form-group row ml-4 mr-4 pb-1">
                                <label for="lobName">Line of Business Name:</label>
                                <input type="text" class="form-control form-control-user" name="lobType"
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