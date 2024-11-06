<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TGP</title>
    <?php include 'session.php'?>
    <?php include 'header_links.php'?>
</head>
<body>
    <div class="container ">
        <div class="row">
            <div class="col-12 col-md-2">
                <?php include 'navbar.php'?>
            </div>
            <div class="col-12 col-md-10">
            <div class="row content-main">
            <div class="col-12 col-md-8">
                    <div class="shadow border forcasting-profile sting-profile rounded rounded-4 p-4 pt-5" style="height: 170px">
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

                <div class="forcasting-profile col-12 col-md-4">
                    <div class="shadow border rounded rounded-4 p-4 pt-5" style="height: 170px">
                            <h5>Filter Category</h5>
                            <select name="" class="form-select form-select-sm w-100" id="categorySelectDashboard">
                                <option value="Allergy and Inflammation">Allergy and Inflammation</option>
                                <option value="Antibiotics and Antimicrobials">Antibiotics and Antimicrobials</option>
                                <option value="CardioVascular">CardioVascular</option>
                                <option value="Essentials">Essentials</option>
                                <option value="Gastrointestinal Medication">Gastrointestinal Medication</option>
                                <option value="Hematologic Medication">Hematologic Medication</option>
                                <option value="Metabolic Disorders Medications">Metabolic Disorders Medications</option>
                                <option value="Musculoskeletal">Musculoskeletal</option>
                                <option value="Necessities">Necessities</option>
                                <option value="Neurological Medications">Neurological Medications</option>
                                <option value="Pain Relief Medications">Pain Relief Medications</option>
                                <option value="Renal & Urinary Medications">Renal & Urinary Medications</option>
                                <option value="Respiratory Medications">Respiratory Medications</option>
                            </select>
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
                    <div class="d-flex flex-row mb-3 justify-content-between align-items-center">
                        <h5 id="">Summary</h5>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-start">
                            <p id="sale" class="fw-bolder" style="font-size: 40px; margin-top: -20px;">₱0</p>
                            <p style="margin-top: -20px;">Sales</p>
                        </div>
                        <div class="col-md-6 text-start">
                            <p id="sold" class="fw-bolder" style="font-size: 40px; margin-top: -20px;">0</p>
                            <p style="margin-top: -20px;">Sold</p>
                        </div>
                    </div>

                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="shadow border mt-4 rounded rounded-4 p-4 pt-5" style="height: 450px">
                        <div id="loadingIndicator3" style="display: none;">
                            <div id="loader-3" style="height: 100%; width: 100%; display: flex" class="justify-content-center align-items-center">
                                <div class="loading-wave">
                                    <div class="loading-bar"></div>
                                    <div class="loading-bar"></div>
                                    <div class="loading-bar"></div>
                                    <div class="loading-bar"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Chart Wrapper -->
                        <div id="chartWrapper3" style="display: none;">
                            <div id="top10HighSaleProducts"></div> <!-- This is where the chart will be rendered -->
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="shadow border mt-4 rounded rounded-4 p-4 pt-5" style="height: 450px">
                        <div id="loadingIndicator4" style="display: none;">
                            <div id="loader-3" style="height: 100%; width: 100%; display: flex" class="justify-content-center align-items-center">
                                <div class="loading-wave">
                                    <div class="loading-bar"></div>
                                    <div class="loading-bar"></div>
                                    <div class="loading-bar"></div>
                                    <div class="loading-bar"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Chart Wrapper -->
                        <div id="chartWrapper4" style="display: none;">
                            <div id="top10LowSaleProducts"></div> <!-- This is where the chart will be rendered -->
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="shadow border mt-4 rounded rounded-4 p-4 pt-5" style="height: 450px">
                        <div id="loadingIndicator" style="display: none;">
                            <div id="loader-2" style="height: 100%; width: 100%; display: flex" class="justify-content-center align-items-center">
                                <div class="loading-wave">
                                    <div class="loading-bar"></div>
                                    <div class="loading-bar"></div>
                                    <div class="loading-bar"></div>
                                    <div class="loading-bar"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Chart Wrapper -->
                        <div id="chartWrapper" style="display: none;">
                            <div id="monthlysales"></div> <!-- This is where the chart will be rendered -->
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="shadow border mt-4 rounded rounded-4 p-4 pt-5" style="height: 450px">
                        <div id="loadingIndicator2" style="display: none;">
                            <div id="loader-2" style="height: 100%; width: 100%; display: flex" class="justify-content-center align-items-center">
                                <div class="loading-wave">
                                    <div class="loading-bar"></div>
                                    <div class="loading-bar"></div>
                                    <div class="loading-bar"></div>
                                    <div class="loading-bar"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Chart Wrapper -->
                        <div id="chartWrapper2" style="display: none;">
                            <div id="yearlysales"></div> <!-- This is where the chart will be rendered -->
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
