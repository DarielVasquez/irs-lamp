$(document).ready(function() {
    $.ajax({
        url: "data/events_pie.php",
        type: "GET",
        dataType: 'json',
        success: function(data) {
            //console.log(data);
            var status = [];
            var amount = [];

            for (var i in data) {
                status.push(data[i].status);
                amount.push(data[i].amount);
            };

            var chartdata = {
                labels: status,
                datasets: [{
                    label: 'Status: ',
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                    data: amount
                }]
            };

            var ctx = $("#eventsPie");
            var eventsPie = new Chart(ctx, {
                type: 'doughnut',
                data: chartdata,
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        caretPadding: 10,
                    },
                    legend: {
                        display: false
                    },
                    cutoutPercentage: 80,
                },
            });

            /*$('#eventsPie').click(
                function(event) {
                    var activepoints = eventsPie.getElementsAtEvent(event);
                    if (activepoints.length > 0) {
                        //get the index of the slice
                        var clickedIndex = activepoints[0]["_index"];

                        var selectedStatus = eventsPie.data.labels[clickedIndex];

                        var selectedAmount = eventsPie.data.datasets[0].data[clickedIndex];

                        window.location.href = "reports-viewer?status=" + selectedStatus + "&amount=" + selectedAmount;
                    } else {}
                }
            )*/

        },
        error: function(data) {
            console.log(data);
        }
    });
});