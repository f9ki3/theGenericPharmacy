$(document).ready(function() {
    $.ajax({
        url: '../server/get_sales_data.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            var years = data.map(function(item) {
                return item.year;
            });
            var sales = data.map(function(item) {
                // Convert each sales value to number format
                return Number(item.total_sales);
            });
            
            var options = {
                chart: {
                    type: 'line' // Set the chart type to 'line'
                },
                series: [{
                    name: 'sales',
                    data: sales, // Example sales data for the years 2019-2023
                    color: '#FF0000' // Red color
                }],
                xaxis: {
                    categories: years // Years 2019 to 2023
                }
            };

            var chart = new ApexCharts(document.querySelector("#line"), options);

            chart.render();
        },
        error: function(xhr, status, error) {
            $('#sales-data').html('Error: ' + xhr.status + ' - ' + xhr.statusText);
        }
    });
});
