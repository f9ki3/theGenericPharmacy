$(document).ready(function () {
    // Fetch data using AJAX
    $.ajax({
        url: '../server/transaction_data.php',
        dataType: 'json',
        success: function (data) {
            // Populate DataTable with fetched data
            $('#transactionTable').DataTable({
                data: data,
                columns: [
                    { data: 'id' },
                    { data: 'product_name' },
                    { data: 'type' },
                    { data: 'qty' },
                    { data: 'sales' },
                    { data: 'cost' },
                    { data: 'profit' },
                    { data: 'year' }
                ]
            });
        }
    });
});