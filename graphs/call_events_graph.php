<?php
require_once '../config/config.php';
require_once '../config/parameters.php';
require_once '../helpers/utils.php';
require_once '../models/dashboard.php';

$startDate = isset($_GET['datastart'])? $_GET['datastart']:NULL;
$endDate = isset($_GET['dataend'])? $_GET['dataend']:NULL;

?>

    <div class="chart-bar ">
        <canvas id="callEvents"></canvas>
    </div>
    <hr>
    <div class="chart-subtitle d-flex justify-content-center">
        <?php echo "Results from: ".$startDate." - ".$endDate?>
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
                    $sql .= "where e.typeissueid = ti.id and date(e.createdate) between '".$startDate."' and '".$endDate."' group by ti.name ";
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
                        $sql .= "where e.typeissueid = ti.id and date(e.createdate) between '".$startDate."' and '".$endDate."' group by ti.name ";
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
        var startDate = '<?php echo $startDate; ?>';
        var endDate = '<?php echo $endDate; ?>';

        window.location.href = "reports-loadCalls?issue=" + selectedIssue  + "&startDate=" + startDate + "&endDate=" + endDate;
    }

});
</script>
