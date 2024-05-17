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
                                <h5>Accountant </h5>
                                <h3 class="fw-bolder"><?php echo $fname, ' ', $lname;?></h3>
                            </div>
                            <div class="ps-4 ms-5 border-start">
                                <h5>0 </h5>
                                <h5 class="fw-bolder">Today</h5>
                            </div>
                            <div class="ps-3 ms-3">
                                <h5>0 </h5>
                                <h5 class="fw-bolder">Monthly</h5>
                            </div>
                            <div class="ps-3 ms-3">
                                <h5>3,562 </h5>
                                <h5 class="fw-bolder">Annual</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="shadow border mt-4 rounded rounded-4 p-4 pt-5" style="height: 170px">
                            <h5>Revenue</h5>
                            <h2 class="fw-bolder">PHP 831,991.50 </h2>
                    </div>
                </div>
               </div>

               <div class="row">
                <div class="col-12 col-md-6">
                        <div class="shadow border mt-4 rounded rounded-4 p-4 pt-5" style="height: auto">
                            <h5 class="fw-bolder ms-3">Yearly Sales</h5>
                            <div id="chart">

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="shadow border mt-4 rounded rounded-4 p-4 pt-5" style="height: auto">
                            <h5 class="fw-bolder ms-3">Yearly Profit</h5>
                            <div id="pie"></div>
                        </div>
                    </div>
               </div>
               <div class="row">
                <div class="col-12 col-md-6">
                        <div class="shadow border mt-4 rounded rounded-4 p-4 pt-5" style="height: auto">
                            <h5 class="fw-bolder ms-3">Yearly Sales</h5>
                            <div id="line">

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="shadow border mt-4 rounded rounded-4 p-4 pt-5" style="height: auto">
                            <h5 class="fw-bolder ms-3">Top Sale Product</h5>
                            <ul class="list-group">
                                <li class="list-group-item d-flex m-0 justify-content-between">
                                    <p>FACE MASK</p>
                                    <p>13,100 sales</p>
                                </li>
                                <li class="list-group-item d-flex m-0 justify-content-between">
                                    <p>HAND SANITIZER</p>
                                    <p>12,500 sales</p>
                                </li>
                                <li class="list-group-item d-flex m-0 justify-content-between">
                                    <p>PAIN RELIEF TABLETS</p>
                                    <p>11,750 sales</p>
                                </li>
                                <li class="list-group-item d-flex m-0 justify-content-between">
                                    <p>MULTIVITAMINS</p>
                                    <p>10,400 sales</p>
                                </li>
                                <li class="list-group-item d-flex m-0 justify-content-between">
                                    <p>COUGH SYRUP</p>
                                    <p>9,800 sales</p>
                                </li>
                            </ul>

                        </div>
                    </div>
               </div>
               
            </div>

        </div>

    </div>
    <?php include 'footer_links.php'?>
</body>
</html>
