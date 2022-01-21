<!--Campaigns-->
<script>
$(document).on("click", '.modifyCampaign', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("dataid");
    $('.modifyCampaignData').load('modals/campaign/modify_campaign.php?dataid='+record,function(){
        $('#modifyCampaignModal').modal({show:true});
    });
});
</script>

<script>
$(document).on("click", '.deleteCampaign', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("dataid");
    $('.deleteCampaignData').load('modals/campaign/delete_campaign.php?dataid='+record,function(){
        $('#deleteCampaignModal').modal({show:true});
    });
});
</script>

<!--LoB-->
<script>
$(document).on("click", '.modifyLob', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("dataid");
    $('.modifyLobData').load('modals/lob/modify_lob.php?dataid='+record,function(){
        $('#modifyLobModal').modal({show:true});
    });
});
</script>

<script>
$(document).on("click", '.deleteLob', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("dataid");
    $('.deleteLobData').load('modals/lob/delete_lob.php?dataid='+record,function(){
        $('#deleteLobModal').modal({show:true});
    });
});
</script>

<!--Entry Types-->
<script>
$(document).on("click", '.modifyEntryType', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("dataid");
    $('.modifyEntryTypeData').load('modals/entry_type/modify_entry_type.php?dataid='+record,function(){
        $('#modifyEntryTypeModal').modal({show:true});
    });
});
</script>

<script>
$(document).on("click", '.deleteEntryType', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("dataid");
    $('.deleteEntryTypeData').load('modals/entry_type/delete_entry_type.php?dataid='+record,function(){
        $('#deleteEntryTypeModal').modal({show:true});
    });
});
</script>

<!--Locations-->
<script>
$(document).on("click", '.modifyLocation', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("dataid");
    $('.modifyLocationData').load('modals/location/modify_location.php?dataid='+record,function(){
        $('#modifyLocationModal').modal({show:true});
    });
});
</script>

<script>
$(document).on("click", '.deleteLocation', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("dataid");
    $('.deleteLocationData').load('modals/location/delete_location.php?dataid='+record,function(){
        $('#deleteLocationModal').modal({show:true});
    });
});
</script>

<!--Status-->
<script>
$(document).on("click", '.modifyStatus', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("dataid");
    $('.modifyStatusData').load('modals/status/modify_status.php?dataid='+record,function(){
        $('#modifyStatusModal').modal({show:true});
    });
});
</script>

<script>
$(document).on("click", '.deleteStatus', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("dataid");
    $('.deleteStatusData').load('modals/status/delete_status.php?dataid='+record,function(){
        $('#deleteStatusModal').modal({show:true});
    });
});
</script>

<!--Users-->
<script>
$(document).on("click", '.modifyUser', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("dataid");
    $('.modifyUserData').load('modals/user/modify_user.php?dataid='+record,function(){
        $('#modifyUserModal').modal({show:true});
    });
});
</script>

<script>
$(document).on("click", '.deleteUser', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("dataid");
    $('.deleteUserData').load('modals/user/delete_user.php?dataid='+record,function(){
        $('#deleteUserModal').modal({show:true});
    });
});
</script>

<!--Issue Types-->
<script>
$(document).on("click", '.modifyIssueType', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("dataid");
    $('.modifyIssueTypeData').load('modals/issue_type/modify_issue_type.php?dataid='+record,function(){
        $('#modifyIssueTypeModal').modal({show:true});
    });
});
</script>

<script>
$(document).on("click", '.deleteIssueType', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("dataid");
    $('.deleteIssueTypeData').load('modals/issue_type/delete_issue_type.php?dataid='+record,function(){
        $('#deleteIssueTypeModal').modal({show:true});
    });
});
</script>

<!--Issues-->
<script>
$(document).on("click", '.modifyIssue', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("dataid");
    $('.modifyIssueData').load('modals/issue/modify_issue.php?dataid='+record,function(){
        $('#modifyIssueModal').modal({show:true});
    });
});
</script>

<script>
$(document).on("click", '.deleteIssue', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("dataid");
    $('.deleteIssueData').load('modals/issue/delete_issue.php?dataid='+record,function(){
        $('#deleteIssueModal').modal({show:true});
    });
});
</script>

<!--Entries-->
<script>
$(document).on("click", '.modifyEntry', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("dataid");
    $('.modifyEntryData').load('modals/entry/modify_entry.php?dataid='+record,function(){
        $('#modifyEntryModal').modal({show:true});
    });
});
</script>

<script>
$(document).on("click", '.deleteEntry', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("dataid");
    $('.deleteEntryData').load('modals/entry/delete_entry.php?dataid='+record,function(){
        $('#deleteEntryModal').modal({show:true});
    });
});
</script>

<!--Events-->
<script>
$(document).on("click", '.modifyEvent', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("dataid");
    $('.modifyEventData').load('modals/event/modify_event.php?dataid='+record,function(){
        $('#modifyEventModal').modal({show:true});
    });
});
</script>

<script>
$(document).on("click", '.deleteEvent', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("dataid");
    $('.deleteEventData').load('modals/event/delete_event.php?dataid='+record,function(){
        $('#deleteEventModal').modal({show:true});
    });
});
</script>

<!--Table Call Events-->
<script>
$(document).on("click", '.tableCalls', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("dataissue");
    var start = $(this).attr("datastart");
    var end = $(this).attr("dataend");
    $('.tableCallsData').load('tables/call_events_table.php?dataissue='+record+'&datastart='+start+'&dataend='+end,
    function(){
    });
});
</script>

<!--Table Campaign Entries-->
<script>
$(document).on("click", '.tableCampaigns', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("datacampaign");
    var start = $(this).attr("datastart");
    var end = $(this).attr("dataend");
    $('.tableCampaignsData').load('tables/campaign_entries_table.php?datacampaign='+record+'&datastart='+start+'&dataend='+end,
    function(){
    });
});
</script>

<!--Table Total Events-->
<script>
/*$(document).on("click", '.tableTotal', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("datadate");
    var start = $(this).attr("datastart");
    var end = $(this).attr("dataend");
    $('.tableTotalData').load('tables/total_events_table.php?datadate='+record+'&datastart='+start+'&dataend='+end,
    function(){
    });
});*/
</script>

<!--Table User Events-->
<script>
$(document).on("click", '.tableUsers', function(e) {
    //alert($this).attr("record");
    var record = $(this).attr("datauser");
    var start = $(this).attr("datastart");
    var end = $(this).attr("dataend");
    $('.tableUsersData').load('tables/user_events_table.php?datauser='+record+'&datastart='+start+'&dataend='+end,
    function(){
    });
});
</script>

<!--Select Issue-->
<script>
function myFunction(val) {
    var record = val;
    $('.selectIssueData').load('plugins/select_issue.php?dataissue='+record,
    function(){
    });
}
</script>



<script>
/*$(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

});*/
</script>