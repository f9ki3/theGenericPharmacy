$(document).ready(function() {
    $.ajax({
        url: '../server/get_sales_cost_profit.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            var sales = data.map(function(item) {
                // Convert each sales value to number format
                return Number(item.sales);
            });

            var cost = data.map(function(item) {
                // Convert each sales value to number format
                return Number(item.cost);
            });

            var profit = data.map(function(item) {
                // Convert each sales value to number format
                return Number(item.profit);
            });


            let formattedSales = sales.toLocaleString('en-US', {
                style: 'currency',
                currency: 'PHP'
            });

            let formattedCost = cost.toLocaleString('en-US', {
                style: 'currency',
                currency: 'PHP'
            });

            let formattedProfit = profit.toLocaleString('en-US', {
                style: 'currency',
                currency: 'PHP'
            });
        
            // Set the formatted revenue text
            $('#salesR').text(formattedSales);
            $('#costR').text(formattedCost);
            $('#profitR').text(formattedProfit);
            
        },
        error: function(xhr, status, error) {
            $('#sales-data').html('Error: ' + xhr.status + ' - ' + xhr.statusText);
        }
    });
});
