function loadData(tableId, url, categoryTitle) {
    // Hide the table wrapper immediately when a new category is selected
    $('#tableWrapper').hide(); // Force the table wrapper to be hidden
    $('#loadingIndicator').show(); // Show the loading indicator

    // Update the title dynamically
    $('#categoryTitle').text(categoryTitle);

    // Fetch data using AJAX
    $.ajax({
        url: url,
        dataType: 'json',
        success: function (data) {
            console.log(data);

            // Initialize or reload DataTable with the fetched data
            var table = $('#' + tableId).DataTable({
                data: data,
                columns: [
                    { data: 'Month and Year' },
                    { data: 'Name (item)' },
                    { data: 'Quantity' },
                    { data: 'Sales' }
                ],
                destroy: true, // Allow reinitializing DataTable
                // Ensure DataTable is shown only after it's ready
                drawCallback: function() {
                    // Hide loading indicator and show the table wrapper once the DataTable is drawn
                    $('#loadingIndicator').hide();
                    $('#tableWrapper').fadeIn(); // Show the table wrapper with a fade-in effect
                }
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

        // Force hide the table wrapper before loading new data
        $('#tableWrapper').hide();
        $('#loadingIndicator').show();
    });
    
    // Initial load with default selection (first category)
    var defaultCategory = $('#categorySelect').val();
    var initialUrl = '../server/sales_spread.php?type=' + encodeURIComponent(defaultCategory);
    loadData('SalesProducts', initialUrl, defaultCategory);
});
