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
            <div class="rounded rounded-4 border p-4 pb-5 shadow mt-4" style="height: auto">
                    <!-- <div class="d-flex flex-column align-items-center justify-content-center" style="height: 500px">
                       <h1 style="font-size: 100px">404</h1>
                       <p><i <i class="bi me-2 bi-rocket-takeoff"></i> Page not found</p>
                    </div> -->
                    <div class="row pt-4">
                        <div class="col-12 col-md-4 d-flex justify-content-center">
                            <div style="width: 200px; height: 200px; border-radius: 100%">
                                <img style="width: 100%; height: 100%; object-fit: cover; border-radius: 100%" src="../uploads/<?php echo $profile?>" alt="">
                            </div>
                            <div>

                            </div>
                        </div>
                        <div class="col-12 col-md-8 pe-5">
                            <h3 class="mt-4 mb-0 p-0 fw-bolder"><?php echo $fname, ' ', $lname;?></h3>
                            <p>Pharmacist</p>
                            <hr>

                                <h5 class="mb-3">Profile</h5>
                               <div class="d-flex flex-row mb-3">
                                    <div class="pe-4">
                                        <p class="p-0 m-0">Address: </p>
                                        <p class="p-0 m-0">Email: </p>
                                        <p class="p-0 m-0">Contact: </p>
                                    </div>
                                    <div>
                                        <p class="p-0 m-0"><?php echo $address?></p>
                                        <p class="p-0 m-0"><?php echo $email?></p>
                                        <p class="p-0 m-0"><?php echo $contact?></p>
                                    </div>
                               </div>
                               <hr>
                               <h5 class="mb-3">About</h5>
                               <p class="text-justify mb-5">As a pharmacist, I prioritize precision in medication dispensation and offer thorough patient counseling. Committed to staying abreast of pharmaceutical advancements, I aim to optimize healthcare outcomes with compassion and expertise.</p>
                        </div>
                    </div>
               
            </div>

        </div>

    </div>
    <?php include 'footer_links.php'?>
</body>
</html>
