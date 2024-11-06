function loadData(tableId, url, categoryTitle) {
    // Initially hide the specified table and show the loading indicator
    $('#' + tableId).hide();
    $('#loadingIndicator').show();
    
    // Update the title dynamically
    $('#categoryTitle').text(categoryTitle);

    // Fetch data using AJAX
    $.ajax({
        url: url,
        dataType: 'json',
        success: function (data) {
            console.log(data);

            // Hide loading indicator and show the specified table
            $('#loadingIndicator').hide();
            $('#' + tableId).show();

            // Initialize or reload DataTable with the fetched data
            $('#' + tableId).DataTable({
                data: data,
                columns: [
                    { data: 'Month and Year' },
                    { data: 'Name (item)' },
                    { data: 'Quantity' },
                    { data: 'Sales' }
                ],
                destroy: true // Allow reinitializing DataTable
            });
        },
        error: function () {
            // Hide loading indicator on error and show a message
            $('#loadingIndicator').hide();
            alert('Failed to fetch data. Please try again.');
        }
    });
}

$(document).ready(function () {
    // Event listener for category selection change
    $('#categorySelect').on('change', function() {
        var category = $(this).val(); // Get the selected category
        var url = '../server/sales_spread.php?type=' + encodeURIComponent(category); // Build URL based on selection
        
        // Load data for the selected category and update the title
        loadData('SalesProducts', url, category);
    });
    
    // Initial load with default selection (first category)
    var defaultCategory = $('#categorySelect').val();
    var initialUrl = '../server/sales_spread.php?type=' + encodeURIComponent(defaultCategory);
    loadData('SalesProducts', initialUrl, defaultCategory);
});
