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
                <div class="row p-2">
                    <div class="rounded rounded-4 border p-4 pb-5" style="height: auto">
                        <div class="d-flex justify-content-between">
                            <h5 class="fw-bolder mb-3">Ticket Information</h5>
                            <a href="">edit</a>
                        </div>
                        <hr class="m-0 p-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div style="width: 49%">
                                <p class="mt-2">Company Name</p>
                                <input type="text" class="form-control" value="Bulacan State University">
                            </div>
                            <div style="width: 49%">
                                <p class="mt-2">Address</p>
                                <input type="text" class="form-control" value="Malolos, Bulacan">
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-between">
                            <div style="width: 49%">
                                <p class="mt-2">Email</p>
                                <input type="text" class="form-control" value="bsu@gmail.com">
                            </div>
                            <div style="width: 49%">
                                <p class="mt-2">Contact</p>
                                <input type="text" class="form-control" value="+63 (93) 696 6612">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <h5 class="fw-bolder mb-3">Parking Type</h5>
                            <a href="">Add</a>
                        </div>
                        <div class="d-flex mb-3 d-none">
                            <input type="text" class="form-control" placeholder="Vehicle Type/Name" style="width: 49%">
                            <input type="text" class="form-control " placeholder="Rate Amount" style="width: 19%; margin-left: 20px">
                            <button class="btn btn-success ms-4 w-25">Add</button>
                            <button class="btn btn-danger ms-4 w-25">Cancel</button>
                        </div>
                        <div class="d-flex mb-3">
                            <input type="text" class="form-control" value="Motorcycle" style="width: 49%">
                            <input type="text" class="form-control " value="50.00" style="width: 19%; margin-left: 20px">
                        </div>
                        <div class="d-flex mb-3">
                            <input type="text" class="form-control" value="Tricycle" style="width: 49%">
                            <input type="text" class="form-control " value="50.00" style="width: 19%; margin-left: 20px">
                        </div>
                        <div class="d-flex mb-3">
                            <input type="text" class="form-control" value="Van" style="width: 49%">
                            <input type="text" class="form-control " value="50.00" style="width: 19%; margin-left: 20px">
                        </div>
                        <div class="d-flex mb-3">
                            <input type="text" class="form-control" value="Sedan" style="width: 49%">
                            <input type="text" class="form-control " value="50.00" style="width: 19%; margin-left: 20px">
                        </div>
                        <div class="d-flex mb-3">
                            <input type="text" class="form-control" value="Pickup" style="width: 49%">
                            <input type="text" class="form-control " value="50.00" style="width: 19%; margin-left: 20px">
                        </div>
                        
                    </div>
                </div>
        </div>

    </div>
    <?php include 'footer_links.php'?>
</body>
</html>
