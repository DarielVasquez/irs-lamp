            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <input type="date" class="form-control form-control-user" name="startDate" id="startDate" />
                    </div>
                    <div class="col-md-5">
                        <input type="date" class="form-control form-control-user" name="endDate" id="endDate" />
                    </div>
                    <button class="btn btn-primary btn-lg" id="dates">Search</button>
                </div>
            </div>

            <hr class="sidebar-divider d-none d-md-block">

            <!-- Bar Chart -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-lg-5">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Call Events Overview</h6>
                            </div>
                            <div class="card-body graphCallsData">
                                <div class="chart-bar">
                                    <canvas id="callEvents"></canvas>
                                </div>
                                <hr>
                                <div class="chart-subtitle d-flex justify-content-center">
                                    <a id="results1"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-5">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Users Events Overview</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body graphUsersData">
                                <div class="chart-area">
                                    <canvas id="userEvents"></canvas>
                                </div>
                                <hr>
                                <div class="chart-subtitle d-flex justify-content-center">
                                    <a id="results3"> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-lg-7">
                    <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Campaign Entries Overview</h6>
                            </div>
                            <div class="card-body graphCampaignsData">
                                <div class="chart-bar">
                                    <canvas id="campaignEntries"></canvas>
                                </div>
                                <hr>
                                <div class="chart-subtitle d-flex justify-content-center">
                                    <a id="results2"> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Pie Chart -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-lg-5">
                        <div class="card shadow mb-4">
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Events</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-pie pt-4 pb-2">
                                    <canvas id="eventsPie"></canvas>
                                </div>
                                <div class="mt-4 text-center small">
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-primary"></i> Completed
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-success"></i> In Progress
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-info"></i> To be Started
                                    </span>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-5">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Entries</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-pie pt-4 pb-2">
                                    <canvas id="entriesPie"></canvas>
                                </div>
                                <div class="mt-4 text-center small">
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-primary"></i> Incidents & Outages
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-success"></i> Needs & Wants
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-info"></i> Rampup
                                    </span>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Area Chart -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-lg-7">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Total Events Overview</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <!--<input type="text" class="form-control form-control-user" name="daterange" value="01/mm/yyyy - 01/mm/yyyy" />
                                <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                    <i class="fa fa-calendar"></i>&nbsp;
                                    <span></span> <i class="fa fa-caret-down"></i>
                                </div>-->
                                <div class="chart-area">
                                    <canvas id="totalEvents"></canvas>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




<script>
//Call Events Bar Graph
$(document).ready(function() {

    var chartdata = {
        type: 'bar',
        data: {
            labels: [
                <?php 
                    $db = new Database();
                    $conn = $db->connect();

                    $sql = "select ti.name as issue, count(e.typeissueid) as amount ";
                    $sql .= "from events as e,typeissue as ti ";
                    $sql .= "where e.typeissueid = ti.id and date(e.createdate) between CURDATE() - INTERVAL 7 DAY and CURDATE() group by ti.name ";
                    $result =  $conn->query($sql);
                    $numrows = mysqli_num_rows($result);
                    $count1 = 0;
                    while ($count1 < $numrows) {
                        $fetch = mysqli_fetch_assoc($result);
                        echo '"'.$fetch["issue"];
                        if($count1 < $numrows)
                            echo '",';
                        $count1 = $count1 + 1;
                    }
                ?>
            ],
            datasets: [{
                label: 'Calls: ',
                backgroundColor: "#4e73df",
                hoverBackgroundColor: "#2e59d9",
                borderColor: "#4e73df",
                hoverBorderColor: '#666666',
                data: [
                    <?php 
                        $db = new Database();
                        $conn = $db->connect();
    
                        $sql = "select ti.name as issue, count(e.typeissueid) as amount ";
                        $sql .= "from events as e,typeissue as ti ";
                        $sql .= "where e.typeissueid = ti.id and date(e.createdate) between CURDATE() - INTERVAL 7 DAY and CURDATE() group by ti.name ";
                        $result =  $conn->query($sql);
                        $numrows = mysqli_num_rows($result);
                        $count1 = 0;
                        while ($count1 < $numrows) {
                            $fetch = mysqli_fetch_assoc($result);
                            echo $fetch["amount"];
                            if($count1 < $numrows)
                                echo ',';
                            $count1 = $count1 + 1;
                        }
                        ?>
                ]
            }]
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'month'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 6
                    },
                    maxBarThickness: 25,
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        //max: 10,
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + number_format(tooltipItem.yLabel);
                    }
                }
            },
            onClick: handleClick
        }
    };

    var ctx = $("#callEvents");
    var callEvents = new Chart(ctx, chartdata);

    function handleClick(evt) {
        var activeElement = callEvents.getElementAtEvent(evt);
        chartdata.data.datasets[activeElement[0]._datasetIndex].data[activeElement[0]._index];

        var clickedDatasetIndex = activeElement[0]._datasetIndex;
        var clickedIndex = activeElement[0]._index;

        var selectedIssue = callEvents.data.labels[clickedIndex];
        var selectedAmount = callEvents.data.datasets[clickedDatasetIndex].data[clickedIndex];
        var startDate = moment().subtract(7, "days").format("YYYY-MM-DD");
        var endDate = moment().format("YYYY-MM-DD");

        window.location.href = "reports-loadCalls?issue=" + selectedIssue  + "&startDate=" + startDate + "&endDate=" + endDate;
    }

});
</script>


<script>
//Campaign Entries Bar Graph
$(document).ready(function() {

    var chartdata = {
        type: 'bar',
        data: {
            labels: [
                <?php 
                    $db = new Database();
                    $conn = $db->connect();

                    $sql = "select c.campaignname as campaign, count(e.entrytypeid) as amount ";
                    $sql .= "from entries as e,campaigns as c ";
                    $sql .= "where e.campaignid = c.id and e.createdate between CURDATE() - INTERVAL 7 DAY and CURDATE() group by c.campaignname ";
                    $result =  $conn->query($sql);
                    $numrows = mysqli_num_rows($result);
                    $count1 = 0;
                    while ($count1 < $numrows) {
                        $fetch = mysqli_fetch_assoc($result);
                        echo '"'.$fetch["campaign"];
                        if($count1 < $numrows)
                            echo '",';
                        $count1 = $count1 + 1;
                    }
                ?>
            ],
            datasets: [{
                label: 'Entries: ',
                backgroundColor: "#4e73df",
                hoverBackgroundColor: "#2e59d9",
                borderColor: "#4e73df",
                hoverBorderColor: '#666666',
                data: [
                    <?php 
                        $db = new Database();
                        $conn = $db->connect();
    
                        $sql = "select c.campaignname as campaign, count(e.entrytypeid) as amount ";
                        $sql .= "from entries as e, campaigns as c ";
                        $sql .= "where e.campaignid = c.id and e.createdate between CURDATE() - INTERVAL 7 DAY and CURDATE() group by c.campaignname ";
                        $result =  $conn->query($sql);
                        $numrows = mysqli_num_rows($result);
                        $count1 = 0;
                        while ($count1 < $numrows) {
                            $fetch = mysqli_fetch_assoc($result);
                            echo $fetch["amount"];
                            if($count1 < $numrows)
                                echo ',';
                            $count1 = $count1 + 1;
                        }
                        ?>
                ]
            }]
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'month'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 6
                    },
                    maxBarThickness: 25,
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        //max: 10,
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + number_format(tooltipItem.yLabel);
                    }
                }
            },
            onClick: handleClick
        }
    };

    var ctx = $("#campaignEntries");
    var campaignEntries = new Chart(ctx, chartdata);

    function handleClick(evt) {
        var activeElement = campaignEntries.getElementAtEvent(evt);
        chartdata.data.datasets[activeElement[0]._datasetIndex].data[activeElement[0]._index];

        var clickedDatasetIndex = activeElement[0]._datasetIndex;
        var clickedIndex = activeElement[0]._index;

        var selectedCampaign = campaignEntries.data.labels[clickedIndex];
        var selectedAmount = campaignEntries.data.datasets[clickedDatasetIndex].data[clickedIndex];
        var startDate = moment().subtract(7, "days").format("YYYY-MM-DD");
        var endDate = moment().format("YYYY-MM-DD");

        window.location.href = "reports-loadCampaigns?campaign=" + selectedCampaign + "&startDate=" + startDate + "&endDate=" + endDate;
    }
});
</script>


<script>
//Total Events Line Graph
$(document).ready(function() {

            var chartdata = {
                type: 'line',
                data: {
                    labels: [
                        <?php 
                            $db = new Database();
                            $conn = $db->connect();

                            $sql = "select count(id) as amount, date(createdate) as firstdate ";
                            $sql .= "from events ";
                            $sql .= "where date(createdate) between CURDATE() - INTERVAL 7 DAY and CURDATE() group by firstdate ";
                            $result =  $conn->query($sql);
                            $numrows = mysqli_num_rows($result);
                            $count1 = 0;
                            while ($count1 < $numrows) {
                                $fetch = mysqli_fetch_assoc($result);
                                echo '"'.$fetch["firstdate"];
                                if($count1 < $numrows)
                                    echo '",';
                                $count1 = $count1 + 1;
                            }
                        ?>
                    ],
                    datasets: [{
                        label: 'Events: ',
                        lineTension: 0.3,
                        backgroundColor: "rgba(78, 115, 223, 0.05)",
                        borderColor: "rgba(78, 115, 223, 1)",
                        pointRadius: 3,
                        pointBackgroundColor: "rgba(78, 115, 223, 1)",
                        pointBorderColor: "rgba(78, 115, 223, 1)",
                        pointHoverRadius: 3,
                        pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                        pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                        pointHitRadius: 10,
                        pointBorderWidth: 2,
                        data: [
                            <?php 
                                $db = new Database();
                                $conn = $db->connect();
            
                                $sql = "select count(id) as amount, date(createdate) as firstdate ";
                                $sql .= "from events ";
                                $sql .= "where date(createdate) between CURDATE() - INTERVAL 7 DAY and CURDATE() group by firstdate ";
                                $result =  $conn->query($sql);
                                $numrows = mysqli_num_rows($result);
                                $count1 = 0;
                                while ($count1 < $numrows) {
                                    $fetch = mysqli_fetch_assoc($result);
                                    echo $fetch["amount"];
                                    if($count1 < $numrows)
                                        echo ',';
                                    $count1 = $count1 + 1;
                                }
                                ?>
                        ]
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    layout: {
                        padding: {
                            left: 10,
                            right: 25,
                            top: 25,
                            bottom: 0
                        }
                    },
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'date',
                                displayFormats: {
                                    quarter: 'll'
                                }
                            },
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                maxTicksLimit: 7
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                min: 0,
                                maxTicksLimit: 5,
                                padding: 10,
                                // Include a dollar sign in the ticks
                                callback: function(value, index, values) {
                                    return number_format(value);
                                }
                            },
                            gridLines: {
                                color: "rgb(234, 236, 244)",
                                zeroLineColor: "rgb(234, 236, 244)",
                                drawBorder: false,
                                borderDash: [2],
                                zeroLineBorderDash: [2]
                            }
                        }],
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        titleMarginBottom: 10,
                        titleFontColor: '#6e707e',
                        titleFontSize: 14,
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        intersect: false,
                        mode: 'index',
                        caretPadding: 10,
                        callbacks: {
                            label: function(tooltipItem, chart) {
                                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                            }
                        }
                    }
                }
            };

            var ctx = $("#totalEvents");
            var totalEvents = new Chart(ctx, chartdata);

            $('#totalEvents').click(
                function(event) {
                    var activepoints = totalEvents.getElementsAtEvent(event);
                    if (activepoints.length > 0) {
                        
                        var clickedIndex = activepoints[0]["_index"];

                        var selectedCreateDate = totalEvents.data.labels[clickedIndex];
                        var selectedAmount = totalEvents.data.datasets[0].data[clickedIndex];
                        var startDate = moment().subtract(7, "days").format("YYYY-MM-DD");
                        var endDate = moment().format("YYYY-MM-DD");

                        window.location.href = "reports-loadTotal?createDate=" + selectedCreateDate + "&startDate=" + startDate + "&endDate=" + endDate;
                    } else {}
                }
            )

});
</script>

<script>
//Total Users Bar Graph
$(document).ready(function() {

            var chartdata = {
                type: 'bar',
                data: {
                    labels: [
                        <?php 
                            $db = new Database();
                            $conn = $db->connect();

                            $sql = "select count(e.id) as amount, u.user as user ";
                            $sql .= "from events as e, users as u ";
                            $sql .= "where e.userid = u.id and date(e.createdate) between CURDATE() - INTERVAL 7 DAY and CURDATE() group by user ";
                            $result =  $conn->query($sql);
                            $numrows = mysqli_num_rows($result);
                            $count1 = 0;
                            while ($count1 < $numrows) {
                                $fetch = mysqli_fetch_assoc($result);
                                echo '"'.$fetch["user"];
                                if($count1 < $numrows)
                                    echo '",';
                                $count1 = $count1 + 1;
                            }
                        ?>
                    ],
                    datasets: [{
                        label: 'Users: ',
                        backgroundColor: "#4e73df",
                        hoverBackgroundColor: "#2e59d9",
                        borderColor: "#4e73df",
                        hoverBorderColor: '#666666',
                        data: [
                            <?php 
                                $db = new Database();
                                $conn = $db->connect();
            
                                $sql = "select count(e.id) as amount, u.user as user ";
                                $sql .= "from events as e, users as u ";
                                $sql .= "where e.userid = u.id and date(e.createdate) between CURDATE() - INTERVAL 7 DAY and CURDATE() group by user ";
                                $result =  $conn->query($sql);
                                $numrows = mysqli_num_rows($result);
                                $count1 = 0;
                                while ($count1 < $numrows) {
                                    $fetch = mysqli_fetch_assoc($result);
                                    echo $fetch["amount"];
                                    if($count1 < $numrows)
                                        echo ',';
                                    $count1 = $count1 + 1;
                                }
                                ?>
                        ]
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    layout: {
                        padding: {
                            left: 10,
                            right: 25,
                            top: 25,
                            bottom: 0
                        }
                    },
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'month'
                            },
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                maxTicksLimit: 6
                            },
                            maxBarThickness: 25,
                        }],
                        yAxes: [{
                            ticks: {
                                min: 0,
                                //max: 10,
                                maxTicksLimit: 5,
                                padding: 10,
                                // Include a dollar sign in the ticks
                                callback: function(value, index, values) {
                                    return number_format(value);
                                }
                            },
                            gridLines: {
                                color: "rgb(234, 236, 244)",
                                zeroLineColor: "rgb(234, 236, 244)",
                                drawBorder: false,
                                borderDash: [2],
                                zeroLineBorderDash: [2]
                            }
                        }],
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        titleMarginBottom: 10,
                        titleFontColor: '#6e707e',
                        titleFontSize: 14,
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        caretPadding: 10,
                        callbacks: {
                            label: function(tooltipItem, chart) {
                                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                return datasetLabel + number_format(tooltipItem.yLabel);
                            }
                        }
                    },
                    onClick: handleClick
                }
            };

            var ctx = $("#userEvents");
            var userEvents = new Chart(ctx, chartdata);

            function handleClick(evt) {
                var activeElement = userEvents.getElementAtEvent(evt);
                chartdata.data.datasets[activeElement[0]._datasetIndex].data[activeElement[0]._index];

                var clickedDatasetIndex = activeElement[0]._datasetIndex;
                var clickedIndex = activeElement[0]._index;

                var selectedUser = userEvents.data.labels[clickedIndex];
                var selectedAmount = userEvents.data.datasets[clickedDatasetIndex].data[clickedIndex];
                var startDate = moment().subtract(7, "days").format("YYYY-MM-DD");
                var endDate = moment().format("YYYY-MM-DD");

                window.location.href = "reports-loadUsers?user=" + selectedUser  + "&startDate=" + startDate + "&endDate=" + endDate;
            }

});
</script>


<script>
$('#dates').click(function(e){
    var start = $("#startDate").val();
    var end = $("#endDate").val();
    $('.graphCallsData').load('graphs/call_events_graph.php?datastart='+start+'&dataend='+end,
            function(){
            });
    $('.graphCampaignsData').load('graphs/campaign_entries_graph.php?datastart='+start+'&dataend='+end,
            function(){
            });
    $('.graphUsersData').load('graphs/user_events_graph.php?datastart='+start+'&dataend='+end,
            function(){
            });
});
</script>

<script>
$(function() {
    var start = moment().subtract(7, "days").format("YYYY-MM-DD");
    var end = moment().format("YYYY-MM-DD");

    document.getElementById('startDate').value = start;
    document.getElementById('endDate').value = end;
    document.getElementById('results1').innerHTML = "Results from: "+start+" - "+end;
    document.getElementById('results2').innerHTML = "Results from: "+start+" - "+end;
    document.getElementById('results3').innerHTML = "Results from: "+start+" - "+end;
});
</script>

<script type="text/javascript" src="graphs/events_pie.js"></script>
<script type="text/javascript" src="graphs/entries_pie.js"></script>