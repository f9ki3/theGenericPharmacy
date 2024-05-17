$(document).ready(function() {
    $.ajax({
        url: '../server/top_5_product.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            var listGroup = '<ul class="list-group">';
            $.each(data, function(index, item) {
                listGroup += '<li class="list-group-item d-flex m-0 justify-content-between">';
                listGroup += '<p>' + item.product_name + '</p>';
                listGroup += '<p>' + item.qty + '</p>';
                listGroup += '<p>' + item.sales + '</p>';
                listGroup += '</li>';
            });
            listGroup += '</ul>';
            $('#data-list').html(listGroup);
        },
        error: function(xhr, status, error) {
            $('#data-list').html('Error: ' + xhr.status + ' - ' + xhr.statusText);
        }
    });
});
