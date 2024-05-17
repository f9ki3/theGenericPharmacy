$(document).ready(function() {
    $.ajax({
        url: '../server/get_revenue.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            var revenue = data.map(function(item) {
                // Convert each sales value to number format
                return Number(item.revenue);
            });


            let formattedRevenue = revenue.toLocaleString('en-US', {
                style: 'currency',
                currency: 'PHP'
            });
        
            // Set the formatted revenue text
            $('#revenue').text(formattedRevenue);
            
        },
        error: function(xhr, status, error) {
            $('#sales-data').html('Error: ' + xhr.status + ' - ' + xhr.statusText);
        }
    });
});
