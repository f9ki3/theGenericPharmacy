<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Center Example</title>
    <style>
        html, body {
            height: 100%; /* Ensure full height of the page */
            margin: 0; /* Remove default margin */
            display: flex;
            justify-content: center; /* Horizontally center */
            align-items: center; /* Vertically center */
        }

        .center-content {
            text-align: center; /* Center text inside the container */
            padding: 20px; /* Add some padding */
            border-radius: 8px; /* Optional: rounded corners */
        }
    </style>
</head>
<body>

    <div class="center-content">
            <p>You have successfully logged out. Thank you for using our service!</p>
            <div>
                <img style="width: 50%;" src="../assets/img/logout_message.svg" alt="">
            </div>
    </div>
</body>
<script>
    setTimeout(() => {
        window.location.href = '../';
    }, 3000);  // Redirect after 3 seconds
</script>
