// Get the timeOut input element
var timeOutInput = document.getElementById('timeOut');

// Add an event listener for input change
timeOutInput.addEventListener('input', function() {
    // Get the value of the timeOut input
    var selectedDateTime = new Date(this.value);
    
    // Get the current date and time
    var now = new Date();

    // Disable past date and time
    if (selectedDateTime < now) {
        // If it's in the past, reset the value to the current time
        var dateString = now.getFullYear() + '-' + pad(now.getMonth() + 1) + '-' + pad(now.getDate()) + 'T' + pad(now.getHours()) + ':' + pad(now.getMinutes());
        this.value = dateString;
    }
});

// Function to pad single digit with leading zero
function pad(number) {
    if (number < 10) {
        return '0' + number;
    }
    return number;
}
