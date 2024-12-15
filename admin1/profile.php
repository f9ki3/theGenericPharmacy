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
            <div class="col-12 col-md-10 ">
            <div class="row">
            <div class="rounded rounded-4  pb-5" style="height: auto">
                    <div class="row">    
                        <div class="col-12 col-md-12">
                            <div class="d-flex flex-column justify-content-center align-items-center ">
                                <div class="rounded" style="height: 300px; width: 100%;">
                                    <img class="rounded" style="object-fit: cover; width: 100%; height: 100%" src="../assets/img/wall1.jpeg" alt="">
                                </div>
                                <div class="profile">
                                    <img style="width: 100%; height: 100%; object-fit: cover; border-radius: 100%" src="../uploads/<?php echo $profile?>" alt="">
                                </div>
                            </div>
                                <div class="d-flex flex-row align-items-center">
                                    <div class="w-75">
                                        <h3 class=" mt-4 mb-0 p-0 fw-bolder"><?php echo $fname, ' ', $lname;?></h3>
                                        <p>Pharmacist</p>
                                    </div>
                                    <div class="w-75 text-end">
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#edit">Edit</button>
                                        <button class="btn btn-sm border-danger text-danger" data-bs-toggle="modal" data-bs-target="#change_pass">Change Password</button>
                                    </div>
                                </div>
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

    <div class="modal mt-5 fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content w-100">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Profile</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" id="edit_id" value="<?php echo $id?>">
            <p class="m-0 pb-1">Username</p>
            <input id="edit_u_name" style="width: 96%" class="form-control" type="text" placeholder="Enter Username" value="<?php echo $username?>">
            
            <div class="d-flex flex-row mb-2">
                <div>
                    <p class="m-0 pb-1">First Name</p>
                    <input id="edit_f_name" style="width: 98%" class="form-control" type="text" placeholder="First Name" value="<?php echo $fname?>">
                </div>
                <div>
                    <p class="m-0 pb-1">Last Name</p>
                    <input id="edit_l_name" style="width: 98%" class="form-control" type="text" placeholder="Last Name" value="<?php echo $lname?>">
                </div>
            </div>
            <p class="m-0 pb-1">Address</p>
            <input id="edit_address" style="width: 96%" class="form-control" type="text" placeholder="Address" value="<?php echo $address?>">
            <div class="d-flex flex-row mt-2">
                <div>
                    <p class="m-0 pb-1">Email</p>
                    <input id="edit_email_add" style="width: 98%" class="form-control" type="text" placeholder="Email" value="<?php echo $email?>">
                </div>
                <div>
                    <p class="m-0 pb-1">Contact</p>
                    <input id="edit_contact_no" style="width: 98%" class="form-control" type="text" placeholder="Contact" value="<?php echo $contact?>">
                </div>
            </div>
            <div class="mb-3 mt-2" style="width: 96%">
                <label for="formFile" class="form-label">Profile Picture</label>
                <input id="edit_profile_pic" class="form-control" type="file" id="formFile">
            </div>        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn text-danger border-danger" data-bs-dismiss="modal">Close</button>
            <button id="update" type="button" class="btn btn-danger">Update</button>
        </div>
        </div>
    </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade mt-5" id="change_pass" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Change Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="edit_id_pass" value="<?php echo $id?>">
                <p>New Password</p>
                <input id="new_pass" style="width: 98%" class="form-control mb-3" type="text" placeholder="Enter your new password">
                <p>Confirm Password</p>
                <input id="confirm_pass" style="width: 98%" class="form-control" type="text" placeholder="Confirm your new password">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn text-danger border-danger" data-bs-dismiss="modal">Close</button>
                <button id="change_password" type="button" class="btn btn-danger">Change Password</button>
            </div>
            </div>
        </div>
        </div>
    <?php include 'footer_links.php'?>
</body>
</html>
