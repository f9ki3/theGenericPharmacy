$(document).ready(function() {
    // Make an AJAX request to your PHP script
    $.ajax({
        url: '../server/get_vehicles.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            console.log(data);
            // Loop through the returned data and append it to the select dropdown
            $.each(data, function(index, vehicle) {
                $('#vehicle').append('<option value="' + vehicle.parking_rate + ',' + vehicle.p_id +'">' + vehicle.parking_name +'</option>');
            });
        },
        error: function(xhr, status, error) {
            // Handle errors
            console.error('Error: ' + error);
        }
    });
});
