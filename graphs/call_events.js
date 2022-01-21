$(document).ready(function() {
    $.ajax({
        url: "data/call_events.php",
        type: "GET",
        dataType: 'json',
        success: function(data) {
            console.log(data);
            var issue = [];
            var date = [];
            var amount = [];

            for (var i in data) {
                issue.push(data[i].issue);
                date.push(data[i].date);
                amount.push(data[i].amount);
            };

            var chartdata = {
                type: 'bar',
                data: {
                    labels: issue,
                    datasets: [{
                        label: 'Calls: ',
                        backgroundColor: "#4e73df",
                        hoverBackgroundColor: "#2e59d9",
                        borderColor: "#4e73df",
                        hoverBorderColor: '#666666',
                        data: amount
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

                window.location.href = "reports-load?issue=" + selectedIssue + "&amount=" + selectedAmount;
            }

        },
        error: function(data) {
            console.log(data);
        }
    });
});