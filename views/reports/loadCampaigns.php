    <div class="d-flex justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
        </div>
    </div>

    <script>
        var url_string = window.location.href;
        var url = new URL (url_string);

        var campaign = url.searchParams.get("campaign");
        var startDate = url.searchParams.get("startDate");
        var endDate = url.searchParams.get("endDate");
    </script>

    <form name="campaignEntries" action="<?=base_url?>reports-campaigns" method="POST">
        <input type="hidden" id="startDate" name="startDate" />
        <script>document.getElementById("startDate").value = startDate;</script>
        <input type="hidden" id="endDate" name="endDate" />
        <script>document.getElementById("endDate").value = endDate;</script>
        <input type="hidden" id="campaign" name="campaign" />
        <script>document.getElementById("campaign").value = campaign;</script>
        <script type="text/javascript">document.campaignEntries.submit();</script>
    </form>

