                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800 ">New Event</h1>

                    <!-- Divider -->
                    <hr class="sidebar-divider d-none d-md-block">
                    <!-- Create Event Modal-->
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <!--Body-->            
                                <div class="modal-body">
                                    <form action="<?=base_url?>events-create" method="POST"> <!-- class="user"-->
                                        <div class="container-fluid">      
                                            <div class="d-flex justify-content-center py-2">
                                                <h5>Create New Event</h5>
                                            </div>
                                            <div class="form-group row ml-4 mr-4 pb-1">
                                                    <label for="subject">Subject:</label>
                                                    <input type="text" required class="form-control form-control-user" name="subject"
                                                        placeholder="Ejemplo...">
                                            </div>

                                            <div class="form-group row ml-4 mr-4 pb-1">
                                                    <label for="description">Description:</label>
                                                    <input type="text" required class="form-control form-control-user" name="description"
                                                        placeholder="Ejemplo...">
                                            </div>

                                            <!--onchange="myFunction(this.value)"-->
                                            <div class="form-group row ml-4 mr-4 pb-1">
                                            <?php $issue_types = Utils::showIssueTypes(); ?>
                                                <label for="issue_types">Choose an issue type:</label>
                                                <select name="issue_types" required class="form-control form-control-user" id="issue_types" onchange="myFunction(this.value)">
                                                    <option value="" selected disabled hidden>Select an issue type</option>
                                                    <?php $i = 1; foreach($issue_types as $type): ?>
                                                        <option value="<?= $type['id'] ?>">
                                                            <?= $type['name'] ?>
                                                            <?php $typeissue = $type['id'];?>
                                                        </option>
                                                    <?php $i++; endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="form-group row ml-4 mr-4 pb-1 selectIssueData">
                                                <label for="issues">Choose an issue:</label>
                                                <select name="issues" required class="form-control form-control-user" >
                                                    <option value="" selected disabled hidden>Select an issue type above</option>
                                                </select>
                                            </div>

                                            <div class="form-group row ml-4 mr-4 pb-1">
                                            <?php $campaigns = Utils::showCampaigns(); ?>
                                                <label for="campaigns">Choose a campaign:</label>
                                                <select name="campaigns" class="form-control form-control-user">
                                                    <?php while ($cam = $campaigns->fetch_object()): ?>
                                                        <option value="<?= $cam->id ?>">
                                                            <?= $cam->campaignname ?>
                                                        </option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>

                                            <div class="form-group row ml-4 mr-4 pb-1">
                                            <?php $status = Utils::showStatus(); ?>
                                                <label for="status">Choose a status:</label>
                                                <select name="status" class="form-control form-control-user">
                                                    <?php while ($sta = $status->fetch_object()): ?>
                                                        <option value="<?= $sta->id ?>" <?=$sta->name == "To be Started" ? 'selected' : ''; ?>>
                                                            <?= $sta->name ?>
                                                        </option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>

                                            <div class="form-group row ml-4 mr-4 pb-1">
                                                    <label for="users">User:</label>
                                                    <input disabled type="text" class="form-control form-control-user disabled" 
                                                        placeholder="<?=$_SESSION['username']?>">
                                                        <input type="hidden" value="<?=$_SESSION['id']?>" name="users" />
                                            </div>

                                            <div class="form-group row ml-4 mr-4 pb-1">
                                                    <label for="agentUser">Agent User:</label>
                                                    <input type="text" required class="form-control form-control-user" name="agentUser"
                                                        placeholder="Ejemplo...">
                                            </div>

                                            <div class="form-group row ml-4 mr-4 pb-4">
                                                    <label for="phone">Phone:</label>
                                                    <input type="tel" required class="form-control form-control-user" name="phone"
                                                        placeholder="1234-5678" pattern="[0-9]{4}-[0-9]{4}">
                                            </div>

                                            <div class="modal-footer">
                                                <input type="submit" value="Save" class="btn btn-primary"/>
                                                <a class="btn btn-secondary shadow-sm" href="<?=base_url?>events-tables">Return</a>                                    
                                            </div>                                      
                                        </div>
                                    </form>
                                </div>                      
                            </div>
                        </div>

<script>
    /*function myFunction(val) {
        var e = document.getElementById("issue_types");
        var ye = e.options[e.selectedIndex].text;
        //alert(val);
        $.ajax({
            url: "data/select_issue.php",
            type: "POST",
            data: { val: val },
            async: true,
            success: function(data) {
                console.log(data);                

            }
        });
    }*/
</script>