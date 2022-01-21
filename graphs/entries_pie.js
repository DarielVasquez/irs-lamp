$(document).ready(function() {
    $.ajax({
        url: "data/entries_pie.php",
        type: "GET",
        dataType: 'json',
        success: function(data) {
            //console.log(data);
            var entry = [];
            var amount = [];

            for (var i in data) {
                entry.push(data[i].entry);
                amount.push(data[i].amount);
            };

            var chartdata = {
                labels: entry,
                datasets: [{
                    label: 'Status: ',
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                    data: amount
                }]
            };

            var ctx = $("#entriesPie");
            var entriesPie = new Chart(ctx, {
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

        },
        error: function(data) {
            console.log(data);
        }
    });
});