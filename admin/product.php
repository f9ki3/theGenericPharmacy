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
            <div class="rounded rounded-4 border p-4 mt-4" style="height: auto">
            <h5 class="fw-bolder mb-3">Product Listing</h5>
                    <div class="d-flex flex-column align-items-center justify-content-center" >
                       <!-- <h1 style="font-size: 100px">404</h1>
                       <p><i <i class="bi me-2 bi-rocket-takeoff"></i> Page not found</p>
                         -->
                         <table id="transactionTable" class="display table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product Name</th>
                                    <th>Type</th>
                                    <th>Qty</th>
                                    <th>Sales</th>
                                    <th>Cost</th>
                                    <th>Profit</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
            </div>

        </div>

    </div>
    <?php include 'footer_links.php'?>
</body>
</html>