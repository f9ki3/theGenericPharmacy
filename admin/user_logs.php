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
                <div class="col-12 col-md-2" style="height: 100vh;">
                    <?php include 'navbar.php'?>
                </div>
            <div class="col-12 col-md-10 ">
            <div class="row">
            <div class="rounded rounded-4 border p-4" style="height: auto">
            <h3 class="fw-bolder mb-3">System Logs</h3>
                    <div class="table-responsive" >
                       <!-- <h1 style="font-size: 100px">404</h1>
                       <p><i <i class="bi me-2 bi-rocket-takeoff"></i> Page not found</p>
                         -->
                         <table id="userlogs" class="display table-striped" style="font-size: 12px">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Date</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Logs</th>
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