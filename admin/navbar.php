<div class=" navbar_allysa">
    <!-- <div>
        <img src="../uploads/LOGOO.png" alt="" style="width: 120px">
    </div> -->
    <div style="width: 100%" class="d-flex align-items-center border rounded rounded-3 p-3 flex-row">
        <div style="width: 50px; height: 50px" class="me-2">
            <img style="object-fit; width: 100%; height: 100%; border-radius: 100%" src="../uploads/<?php echo $profile?>" alt="profile">
        </div>
        <div>
        <p class="fw-bolder" style="font-size: 20px; margin: 0px;">
                <?php
                    $name = $fname . ' ' . $lname; // Use dots (.) for concatenation instead of plus signs (+)
                    if (strlen($name) > 17) {
                        // If yes, truncate the name to 30 characters and add ".."
                        $truncated_name = substr($name, 0, 17) . "..";
                        echo $truncated_name;
                    } else {
                        // If not, simply echo the name
                        echo $name;
                    }
                ?>
        </p>
        <p style="margin: 0px">Super Admin</p> 
        </div>
    </div>
    <div>
        <p class="m-0 p-0 mt-3 fw-bolder">Main Menu</p>
        <li style="text-decoration: none; list-style: none; padding-top: 10px"><a class="text-decoration-none text-dark" href="profile" ><i class="bi me-3 bi-person"></i> Profile</a></li>
        <li style="text-decoration: none; list-style: none; padding-top: 10px"><a class="text-decoration-none text-dark" href="index" ><i class="bi me-3 bi-activity"></i> Dashboard</a></li>
        <li style="text-decoration: none; list-style: none; padding-top: 10px"><a class="text-decoration-none text-dark" href="product" ><i class="bi me-3 bi-ticket-perforated"></i> Sales History</a></li>
        <li style="text-decoration: none; list-style: none; padding-top: 10px"><a class="text-decoration-none text-dark" href="user_logs" ><i class="bi me-3 bi-bar-chart-steps"></i> System Logs</a></li>
        <li style="text-decoration: none; list-style: none; padding-top: 10px"><a class="text-decoration-none text-dark" href="accounts" ><i class="bi me-3 bi-people"></i> Super Admin</a></li>
        <li style="text-decoration: none; list-style: none; padding-top: 10px"><a class="text-decoration-none text-dark" href="admin" ><i class="bi me-3 bi-people"></i> Admin</a></li>
        <hr>
        <p class="m-0 p-0 fw-bolder">Utility Menu</p>
        <li style="text-decoration: none; list-style: none; padding-top: 10px"><a class="text-decoration-none text-dark" href="about" ><i <i class="bi me-3 bi-rocket-takeoff"></i> About</a></li>
        <li style="text-decoration: none; list-style: none; padding-top: 10px"><a class="text-decoration-none text-dark" href="help" ><i class="bi me-3 bi-file-break"></i> Help</a></li>
        <li style="text-decoration: none; list-style: none; padding-top: 10px"><a class="text-decoration-none text-dark" href="logout" ><i class="bi me-3 bi-power"></i> Logout</a></li>
    </div>
</div>

<div class="div_nav sticky sticky-top">
    <!-- <div class>
        <img src="../uploads/LOGOO.png" alt="" style="width: 100px">
    </div> -->
    <div style="width: 90px; height: 90px">
        <img style="object-fit; width: 100%; height: 100%; border-radius: 100%" src="../uploads/<?php echo $profile?>" alt="profile">
    </div>
    <div>
        <button class="btn" data-bs-toggle="modal" data-bs-target="#burger"><i class="bi fs-1 bi-chevron-bar-up"></i></button>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="burger" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Menu</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>
            <li style="text-decoration: none; list-style: none; padding-top: 10px"><a class="text-decoration-none text-dark" href="profile" ><i class="bi me-2 bi-person"></i> Profile</a></li>
            <li style="text-decoration: none; list-style: none; padding-top: 10px"><a class="text-decoration-none text-dark" href="index" ><i class="bi me-2 bi-activity"></i> Forecasting</a></li>
            <li style="text-decoration: none; list-style: none; padding-top: 10px"><a class="text-decoration-none text-dark" href="product" ><i class="bi me-2 bi-ticket-perforated"></i> Sales Listing</a></li>
            <li style="text-decoration: none; list-style: none; padding-top: 10px"><a class="text-decoration-none text-dark" href="user_logs" ><i class="bi me-2 bi-bar-chart-steps"></i> System Logs</a></li>
            <li style="text-decoration: none; list-style: none; padding-top: 10px"><a class="text-decoration-none text-dark" href="accounts" ><i class="bi me-2 bi-people"></i> Accounts</a></li>
            <li style="text-decoration: none; list-style: none; padding-top: 10px"><a class="text-decoration-none text-dark" href="about" ><i <i class="bi me-2 bi-rocket-takeoff"></i> About</a></li>
            <li style="text-decoration: none; list-style: none; padding-top: 10px"><a class="text-decoration-none text-dark" href="help" ><i class="bi me-2 bi-file-break"></i> Help</a></li>
            <li style="text-decoration: none; list-style: none; padding-top: 10px"><a class="text-decoration-none text-dark" href="logout" ><i class="bi me-2 bi-power"></i> Logout</a></li>
        </div>
      </div>
      
    </div>
  </div>
</div>