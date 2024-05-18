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
            <div class="d-flex flex-row justify-content-between align-items-center mb-4">
                <h3 class="fw-bolder mb-3 ">Account List</h3>
                <button class=" btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Create Account+</button>
            </div>
                    <div class="d-flex flex-column align-items-center justify-content-center" >
                       <!-- <h1 style="font-size: 100px">404</h1>
                       <p><i <i class="bi me-2 bi-rocket-takeoff"></i> Page not found</p>
                         -->
                         <table id="accounts" class="display table-striped" style="font-size: 12px">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>First Name</th>
                                    <th>last name</th>
                                    <th>Cost</th>
                                    <th>Profit</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
            </div>

        </div>

    </div>


    <div class="modal mt-5 fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Account Employee</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p class="m-0 pb-1">Username</p>
            <input id="u_name" style="width: 96%" class="form-control" type="text" placeholder="Enter Username">
            
            <div class="d-flex flex-row mb-2">
                <div>
                    <p class="m-0 pb-1">First Name</p>
                    <input id="f_name" style="width: 98%" class="form-control" type="text" placeholder="First Name">
                </div>
                <div>
                    <p class="m-0 pb-1">Last Name</p>
                    <input id="l_name" style="width: 98%" class="form-control" type="text" placeholder="Last Name">
                </div>
            </div>
            <p class="m-0 pb-1">Address</p>
            <input id="address" style="width: 96%" class="form-control" type="text" placeholder="Address">
            <div class="d-flex flex-row mt-2">
                <div>
                    <p class="m-0 pb-1">Email</p>
                    <input id="email_add" style="width: 98%" class="form-control" type="text" placeholder="Email">
                </div>
                <div>
                    <p class="m-0 pb-1">Contact</p>
                    <input id="contact_no" style="width: 98%" class="form-control" type="text" placeholder="Contact">
                </div>
            </div>
            <div class="mb-3 mt-2" style="width: 96%">
                <label for="formFile" class="form-label">Profile Picture</label>
                <input id="profile_pic" class="form-control" type="file" id="formFile">
            </div>
            <p class="m-0 pb-1">Password</p>
            <input id="password" style="width: 96%" class="form-control" type="password" placeholder="Password">
            <p class="m-0 pb-1">Confirm </p>
            <input id="c_password" style="width: 96%" class="form-control" type="password" placeholder="Password">
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn text-danger border-danger" data-bs-dismiss="modal">Close</button>
            <button id="create" type="button" class="btn btn-danger">Create</button>
        </div>
        </div>
    </div>
    </div>
    <?php include 'footer_links.php'?>
</body>
</html>