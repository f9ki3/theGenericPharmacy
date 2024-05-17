$(document).ready(function() {
    // Function to calculate and update values
    function updateValues() {
        // Retrieve values of time-in, time-out, and select element
        var plate_no = $("#plate_no").val();
        var timeIn = $("#timeIn").val();
        var timeOut = $("#timeOut").val();
        var rate_id = $("#vehicle").val();
        var rate_id_array = rate_id.split(',');
        var rate = rate_id_array[0];
        var vehicle_id = rate_id_array[1];

        // Convert time strings to Date objects
        var timeInObj = new Date(timeIn);
        var timeOutObj = new Date(timeOut);

        // Calculate the time difference in milliseconds
        var timeDiff = timeOutObj - timeInObj;

        // Convert milliseconds to hours and round down to the nearest whole number
        var hours = Math.floor(timeDiff / (1000 * 60 * 60));

        var total_bill = rate * hours;
        // Display the total hours
        console.log("Plate No:", plate_no);
        console.log("Vehicle Type Id:", vehicle_id);
        console.log("In:", timeIn);
        console.log("Out:", timeOut);
        console.log("Hours:", hours);
        console.log("Rate:", rate);
        console.log("Total:", total_bill); 
        
        // Populate the summary
        total_bill = parseFloat(total_bill).toFixed(2); // Convert to float and format to 2 decimal places
        total_bill = 'PHP ' + total_bill; // Add PHP currency symbol

        var details = 'Number of Hours: ' + hours + ' Rate: ' + rate;
        // Set the formatted total bill to the element with id 'total_amount'
        $("#total_amount").text(total_bill);
        $("#details").text(details);
    }

    // Attach input event handlers to the input fields
    $("#plate_no, #timeIn, #timeOut, #vehicle").on('input', updateValues);
});
