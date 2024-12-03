<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TGP</title>
    <?php include 'session.php'?>
    <?php include 'header_links.php'?>
</head>
<body>
    <div class="p-3">
        <div class="row">
            <div class="col-12 col-md-2 shadow" style="height: 100vh;">
                <?php include 'navbar.php'?>
            </div>
            <div class="col-12 col-md-10 bg-light">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="forcasting-profile col-12 col-md-4 d-none">
                        <div class=" p-4 pb-0 border rounded-3 mt-3 pt-5" style="height: 170px">
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

                    <div class="col-12 col-md-12">
                        <div class="mt-4 p-4 pt-0 pt-4" style="height: auto">
                        <div class="d-flex flex-row">
                            <div style="width: 40%">
                                <p id="time" class="fw-bolder" style="font-size: 25px; margin-top: -20px;"></p>
                                <p id="date" style="margin-top: -20px"></p> 
                            </div>
                            <div style="width: 40%">
                                <p id="sale" class="fw-bolder" style="font-size: 25px; margin-top: -20px;">₱0</p>
                                <p style="margin-top: -20px;">Sales</p>
                            </div>
                            <div style="width: 20%">
                                <p id="sold" class="fw-bolder" style="font-size: 25px; margin-top: -20px;">0</p>
                                <p style="margin-top: -20px;">Sold</p>
                            </div>
                        </div>

                        </div>
                    </div>
                    
                </div>
                <div class="col-12 col-md-6">
                <div class="col-12 col-md-12">
                        <div class="p-4 pb-0 border rounded-3 mt-3" style="height: 280px; background-color: white">
                            <div id="loadingIndicator5" style="display: none;">
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
                            <div id="chartWrapper5" style="display: none;">
                                <div id="forecastQuantity"></div> <!-- This is where the chart will be rendered -->
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="p-4 pb-0 border rounded-3 mt-3" style="height: 280px; background-color: white">
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
                        <div class="p-4 pb-0 border rounded-3 mt-3" style="height: 280px; background-color: white">
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
