$(document).ready(function() {
    $("#generateBtn").click(function() {
        var plate_no = $("#plate_no").val();
        var timeIn = $("#timeIn").val();
        var timeOut = $("#timeOut").val();
        var rate_id = $("#vehicle").val();
        var rate_id_array = rate_id.split(',');
        var rate = parseFloat(rate_id_array[0]);
        var vehicle_id = rate_id_array[1];

        // Convert time strings to Date objects
        var timeInObj = new Date(timeIn);
        var timeOutObj = new Date(timeOut);

        // Calculate the time difference in milliseconds
        var timeDiff = timeOutObj - timeInObj;

        // Convert milliseconds to hours
        var hours = timeDiff / (1000 * 60 * 60);

        var total_bill = rate * hours.toFixed(2);
        // Display the total hours
        console.log("Plate No:", plate_no);
        console.log("Vehicle Type Id:", vehicle_id);
        console.log("In:", timeIn);
        console.log("Out:", timeOut);
        console.log("Hours", hours); 
        console.log("Rate", rate); 
        console.log("Total:", total_bill); 

        // AJAX request to insert_ticket.php
        $.ajax({
            type: "POST",
            url: "../server/insert_ticket.php",
            data: {
                plate_no: plate_no,
                vehicle_id: vehicle_id,
                time_in: timeIn,
                time_out: timeOut,
                hours: hours,
                rate: rate,
                total_bill: total_bill
            },
            success: function(response) {
                // Handle success response here
                console.log(response);

                alertify.success('Success Generated Ticket');

                $("#plate_no").val("");
                $("#timeIn").val("");
                $("#timeOut").val("");
                $("#total_amount").text("PHP 0.00");
                $("#details").text("Number of Hours: 0 Rate: 0.00");
            },
            error: function(xhr, status, error) {
                // Handle error here
                console.error(xhr.responseText);
            }
        });
    });
});

