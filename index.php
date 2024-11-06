<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TGP</title>
    <?php include 'config/session.php'?>
    <?php include 'config/header_links.php'?>
</head>
<body>
    <div class="container">
        <div id="loader" style="height: 100%; width: 100%; display: flex" class="justify-content-center align-items-center">
            <div class="loading-wave">
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
                <div class="loading-bar"></div>
            </div>

        </div>
        <div id="login-div" class="row " style="display: none">
            <!-- <div class="d-flex flex-row justify-content-between align-items-center">
                <div class="d-flex flex.row align-items-center">
                    <img src="uploads/LOGOO.png" alt="" style="width: 100px">
                    <h3>The Generic Pharmacy</h3>
                </div>
                <div>
                    
                </div>
            </div> -->
            <div class="col-12 col-md-8" style="padding-top: 150px; padding-left: 70px">
                <div>
                    <img style="width: 100%;" src="assets/img/undraw_medicine_b-1-ol.svg" alt="">
                </div>
            </div>
            <div class="col-12 col-md-4 pt-5 ">
                    <form id="login_form">
                        <div class="p-5 w-100 border mt-5" style="height: auto">
                            <img style="width: 50%" src="uploads/LOGOO.png" alt="">
                            <h3 class="fw-bold">READY TO LOGIN</h3>
                            <hr>
                            <p>Username</p>
                            <input id="username" type="text" class="form-control form-control-lg rounded-4 rounded " placeholder="Enter your Username">
                            <p class="mt-3">Password</p>
                            <input id="password" type="password" class="form-control form-control-lg rounded rounded-4" placeholder="Enter your password">
                            
                            <button type="submit" id="loading" class="mt-3 rounded rounded-4  btn btn-lg  btn-danger w-100 disabled" style="display: none">
                                <div class="spinner-grow spinner-grow-sm m-1" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </button>
                            <button type="submit" id="login_btn"  class="btn mt-3 rounded rounded-4 btn-danger btn-lg w-100">Login</button>
                            <div class="alert mt-3 alert-danger text-center error" role="alert" style="display: none">
                            "Oops! Something doesn’t match. Check your login information and try again.
                            </div>
                        </div>
                    </form>
            </div>
        </div>

    </div>
    <?php include 'config/footer_links.php'?>
</body>
</html>
