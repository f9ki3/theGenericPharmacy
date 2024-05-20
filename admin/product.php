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
        <div class="row ">
            <div class="col-12 col-md-2">
                <?php include 'navbar.php'?>
            </div>
            <div class="col-12 col-md-10">
            <div class="row content-main">
            <div class="rounded rounded-4 border p-4" style="height: auto">
            <h3 class="fw-bolder mb-3">Sales Listing</h3>
                    <div class="table-responsive">
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