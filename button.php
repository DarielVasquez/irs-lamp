<!--Campaigns-->
<script>
$(document).on("click", '.modifyCampaign', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("dataid");
    $('.modifyCampaignData').load('modify_campaign.php?dataid='+record,function(){
        $('#modifyCampaignModal').modal({show:true});
    });
});
</script>

<script>
$(document).on("click", '.deleteCampaign', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("dataid");
    $('.deleteCampaignData').load('delete_campaign.php?dataid='+record,function(){
        $('#deleteCampaignModal').modal({show:true});
    });
});
</script>

<!--LoB-->
<script>
$(document).on("click", '.modifyLob', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("dataid");
    $('.modifyLobData').load('modify_lob.php?dataid='+record,function(){
        $('#modifyLobModal').modal({show:true});
    });
});
</script>

<script>
$(document).on("click", '.deleteLob', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("dataid");
    $('.deleteLobData').load('delete_lob.php?dataid='+record,function(){
        $('#deleteLobModal').modal({show:true});
    });
});
</script>

<!--Entry Types-->
<script>
$(document).on("click", '.modifyEntryType', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("dataid");
    $('.modifyEntryTypeData').load('modify_entry_type.php?dataid='+record,function(){
        $('#modifyEntryTypeModal').modal({show:true});
    });
});
</script>

<script>
$(document).on("click", '.deleteEntryType', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("dataid");
    $('.deleteEntryTypeData').load('delete_entry_type.php?dataid='+record,function(){
        $('#deleteEntryTypeModal').modal({show:true});
    });
});
</script>

<!--Locations-->
<script>
$(document).on("click", '.modifyLocation', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("dataid");
    $('.modifyLocationData').load('modify_location.php?dataid='+record,function(){
        $('#modifyLocationModal').modal({show:true});
    });
});
</script>

<script>
$(document).on("click", '.deleteLocation', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("dataid");
    $('.deleteLocationData').load('delete_location.php?dataid='+record,function(){
        $('#deleteLocationModal').modal({show:true});
    });
});
</script>

<!--Status-->
<script>
$(document).on("click", '.modifyStatus', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("dataid");
    $('.modifyStatusData').load('modify_status.php?dataid='+record,function(){
        $('#modifyStatusModal').modal({show:true});
    });
});
</script>

<script>
$(document).on("click", '.deleteStatus', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("dataid");
    $('.deleteStatusData').load('delete_status.php?dataid='+record,function(){
        $('#deleteStatusModal').modal({show:true});
    });
});
</script>

<!--Users-->
<script>
$(document).on("click", '.modifyUser', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("dataid");
    $('.modifyUserData').load('modifY_user.php?dataid='+record,function(){
        $('#modifyUserModal').modal({show:true});
    });
});
</script>

<script>
$(document).on("click", '.deleteUser', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("dataid");
    $('.deleteUserData').load('delete_user.php?dataid='+record,function(){
        $('#deleteUserModal').modal({show:true});
    });
});
</script>