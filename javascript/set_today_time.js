$(document).ready(function(){
    function updateDateTime() {
        var now = new Date();
        
        // Options for date
        var dateOptions = { 
            weekday: 'long', 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric'
        };
        
        // Options for time
        var timeOptions = {
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        };

        // Format date and time separately
        var formattedDate = now.toLocaleDateString('en-US', dateOptions);
        var formattedTime = now.toLocaleTimeString('en-US', timeOptions);
        
        // Update the content of the spans
        $('#date').text(formattedDate);
        $('#time').text(formattedTime);
    }
    
    updateDateTime();
    setInterval(updateDateTime, 1000); // Update every second
});