<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TGP</title>
    <?php include 'session.php'?>
    <?php include 'header_links.php'?>
</head>
<body>
    <div class="container">
        <!-- <div id="loader" style="height: 100%; width: 100%; display: flex" class="justify-content-center align-items-center">
            <svg class="pl" width="240" height="240" viewBox="0 0 240 240">
                <circle class="pl__ring pl__ring--a" cx="120" cy="120" r="105" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 660" stroke-dashoffset="-330" stroke-linecap="round"></circle>
                <circle class="pl__ring pl__ring--b" cx="120" cy="120" r="35" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 220" stroke-dashoffset="-110" stroke-linecap="round"></circle>
                <circle class="pl__ring pl__ring--c" cx="85" cy="120" r="70" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 440" stroke-linecap="round"></circle>
                <circle class="pl__ring pl__ring--d" cx="155" cy="120" r="70" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 440" stroke-linecap="round"></circle>
            </svg>
        </div> -->

        <div class="row">
            <div class="col-12 col-md-2">
                <?php include 'navbar.php'?>
            </div>
            <div class="col-12 col-md-10 p-5">
            <div class="row">
            <div class="col-12 col-md-8">
                    <div class="shadow border mt-4 rounded rounded-4 p-4 pt-5" style="height: 170px">
                        <div class="d-flex flex-row justify-centent-center align-items-center">
                            <div style="width: 90px; height: 90px">
                                <img style="object-fit; width: 100%; height: 100%; border-radius: 100%" src="../uploads/<?php echo $profile?>" alt="profile">
                            </div>
                            <div class="ps-3">
                                <h5 class="">Pharmacist </h5>
                                <h3 class="fw-bolder">
                                <?php
                                $name = $fname . ' ' . $lname; // Use dots (.) for concatenation instead of plus signs (+)
                                if (strlen($name) > 17) {
                                    // If yes, truncate the name to 30 characters and add ".."
                                    $truncated_name = substr($name, 0, 17) . "..";
                                    echo $truncated_name;
                                } else {
                                    // If not, simply echo the name
                                    echo $name;
                                }
                                ?>

                            </h3>
                            </div>
                            <div class="ps-4 ms-5 border-start">
                                <p class="p-0 m-0"><?php 
                                if (strlen($address) > 30) {
                                    // If yes, truncate the address to 30 characters and add ".."
                                    $truncated_address = substr($address, 0, 30) . "..";
                                    echo $truncated_address;
                                } else {
                                    // If not, simply echo the address
                                    echo $address;
                                }
                                ?></p>
                                <p class="p-0 m-0"><?php echo $email?></p>
                                <p class="p-0 m-0"><?php echo $contact?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="shadow border mt-4 rounded rounded-4 p-4 pt-5" style="height: 170px">
                            <h5>Revenue</h5>
                            <h2 id="revenue" class="fw-bolder">PHP 0.00 </h2>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="shadow border mt-4 rounded rounded-4 p-4 pt-4" style="height: 170px">
                            <h5>Todays Time & Date </h5>
                            <div id="date-time" style="padding: 0px">
                                <p id="time" class="mt-0 fw-bolder" style="font-size: 40px"></p>
                                <p id="date" style="margin-top: -20px"></p> 
                            </div>
                    </div>
                </div>

                <div class="col-12 col-md-8">
                    <div class="shadow border mt-4 rounded rounded-4 p-4 pt-4" style="height: 170px">
                        <h5 >Summary</h5>
                        <div class="d-flex flex-row justify-content-evenly align-items-center">
                            <div class=" text-center">
                                <h5 id="salesR" class="fw-bolder mt-2">0 </h5>
                                <h5>Sales</h5>
                            </div>
                            <div class=" text-center">
                                <h5 id="costR" class="fw-bolder mt-2">0 </h5>
                                <h5>Cost</h5>
                            </div>
                            <div class=" text-center">
                                <h5 id="profitR" class=fw-bolder "mt-2">0 </h5>
                                <h5>Profit</h5>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                        <div class="shadow border mt-4 rounded rounded-4 p-4 pt-5" style="height: 450px">
                            <h5 class="fw-bolder ms-3">Yearly Sales</h5>
                            <div id="chart">

                            </div>
                        </div>
                </div>
                <div class="col-12 col-md-6">
                        <div class="shadow border mt-4 rounded rounded-4 p-4 pt-5" style="height: 450px">
                            <h5 class="fw-bolder ms-3">Yearly Profit</h5>
                            <div id="pie"></div>
                        </div>
                    </div>
               </div>
               <div class="row">
                <div class="col-12 col-md-6">
                        <div class="shadow border mt-4 rounded rounded-4 p-4 pt-5" style="height: 450px">
                            <h5 class="fw-bolder ms-3">Yearly Sales</h5>
                            <div id="line">

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="shadow border mt-4 rounded rounded-4 p-4 pt-5" style="height: 450px">
                            <h5 class="fw-bolder ms-3">Top Sale Product</h5>
                            <div id="data-list">

                            </div>

                        </div>
                    </div>
               </div>
               
            </div>

        </div>

    </div>
    <?php include 'footer_links.php'?>
    <script>
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
    </script>
</body>
</html>
