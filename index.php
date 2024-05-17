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
            <svg class="pl" width="240" height="240" viewBox="0 0 240 240">
                <circle class="pl__ring pl__ring--a" cx="120" cy="120" r="105" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 660" stroke-dashoffset="-330" stroke-linecap="round"></circle>
                <circle class="pl__ring pl__ring--b" cx="120" cy="120" r="35" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 220" stroke-dashoffset="-110" stroke-linecap="round"></circle>
                <circle class="pl__ring pl__ring--c" cx="85" cy="120" r="70" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 440" stroke-linecap="round"></circle>
                <circle class="pl__ring pl__ring--d" cx="155" cy="120" r="70" fill="none" stroke="#000" stroke-width="20" stroke-dasharray="0 440" stroke-linecap="round"></circle>
            </svg>
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
                <h1 class="fw-bolder" style="font-size: 50px"><b class="text-danger">T</b>G<b class="text-danger">P</b>agpagaling ng Pilipinas!</h1>
                <img src="uploads/SG.png" alt="" style="width: 700px; height: auto">
            </div>
            <div class="col-12 col-md-4 pt-5 ">
                    <form id="login_form">
                        <div class="p-5 w-100  mt-5" style="height: 550px">
                            <p class=" mt-5">We Keep Everything</p>
                            <h3 class="fw-bold">READY TO LOGIN</h3>
                            <hr>
                            <p>Username</p>
                            <input id="username" type="text" class="form-control form-control-lg rounded-4 rounded placeholder="Enter your Username">
                            <p class="mt-3">Password</p>
                            <input id="password" type="password" class="form-control form-control-lg rounded rounded-4" placeholder="Enter your password">
                            
                            <button type="submit" id="loading" class="mt-3 rounded rounded-4  btn btn-lg  btn-danger w-100 disabled" style="display: none">
                                <div class="spinner-grow spinner-grow-sm m-1" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </button>
                            <button type="submit" id="login_btn"  class="btn mt-3 rounded rounded-4 btn-danger btn-lg w-100">Login</button>
                            <div class="alert mt-3 alert-danger text-center error" role="alert" style="display: none">
                                Please check your login Credentials
                            </div>
                        </div>
                    </form>
            </div>
        </div>

    </div>
    <?php include 'config/footer_links.php'?>
</body>
</html>
