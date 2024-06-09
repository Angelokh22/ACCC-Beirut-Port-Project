<?php include "../../../php/check_login.php"; ?>
<?php

    $session_result = send_query("SELECT * FROM Sessions WHERE sessionToken = '$jwt'", true, false);
    if(!$session_result){
        session_destroy();
        header("Location:../../../../index.php");
    }
    $userid = $session_result['userID'];
    $user_result = send_query("SELECT * FROM Users WHERE userID = $userid", true, true)[0];


    $adresse_result = send_query("SELECT * FROM Adresses WHERE userID = $userid", true, true);
    $is_adresse = false;
    if($adresse_result){
        $is_adresse= true;
    }
        
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css"
        integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-thin.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-light.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css" />
    <link rel="stylesheet" href="../../../../static/css/admin/panel.css">
    <link rel="stylesheet" href="../../../../static/css/worker/email.css">
    <link rel="shortcut icon" href="../../../../static/img/favicon.ico" type="image/x-icon">
    <title>ACCC Beirut Port Prject</title>
</head>

<body>

    <!-- NavBar Start -->
    <section>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
                    aria-controls="offcanvasExample">
                    <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
                </button>

                <a class="navbar-brand theme-text" href="../../../../index.php">
                    <img src="../../../../static/img/logo-only.png" alt="ACCC LOGO" id="brand-logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar"
                    aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="topNavBar">
                    <ul class="d-flex ms-auto navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img src="https://static-00.iconduck.com/assets.00/person-fill-icon-481x512-40cd90q6.png"
                                    alt="PFP" id="pfp-logo">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><span class="dropdown-item greatings" href="#">Hello, <span id="name">
                                <?php
                                    $result = send_query("SELECT userID from Sessions WHERE sessionToken = '$jwt'", true, false);
                                    $userid = $result['userID'];
                                    $username = send_query("SELECT userName from Users WHERE userID = '$userid'", true, false)['userName'];
                                    echo $username;
                                ?>
                                </span></span></li>
                                <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                                <li>
                                    <a class="dropdown-item" href="../../../php/logout.php">Log Out</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </section>
    <!-- NavBar End -->

    <!-- SideBar Start -->
    <section>

<div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
    <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
            <ul class="navbar-nav">
                <li>
                    <div class="text-muted small fw-bold text-uppercase px-3 mt-3">
                        Dashboard
                    </div>
                </li>
                <li class="mt-3">
                    <a href="../dashboard.php" class="nav-link px-3">
                        <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="mb-4">
                    <hr class="dropdown-divider bg-light" />
                </li>
                <li>
                    <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                        Services
                    </div>
                </li>
                <li>
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#orders">
                        <span class="me-2">
                            <i class="fa-regular fa-truck-fast"></i>
                        </span>
                        <span>Orders</span>
                        <span class="ms-auto">
                            <span class="right-icon">
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </span>
                    </a>
                    <div class="collapse" id="orders">
                        <ul class="navbar-nav ps-3">
                            <li>
                                <a href="../orders/import-export.php" class="nav-link px-3">
                                    <span class="me-2">
                                        <i class="fa-regular fa-ferry"></i>
                                    </span>
                                    <span>Import / Export</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#marketplace">
                        <span class="me-2">
                            <i class="bi bi-cart3"></i>
                        </span>
                        <span>MarketPlace</span>
                        <span class="ms-auto">
                            <span class="right-icon">
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </span>
                    </a>
                    <div class="collapse" id="marketplace">
                        <ul class="navbar-nav ps-3">
                            <li>
                                <a href="../marketplace/marketplace-list.php" class="nav-link px-3">
                                    <span class="me-2">
                                        <i class="bi bi-card-list"></i>
                                    </span>
                                    <span>View Market List</span>
                                </a>
                            </li>
                            <li>
                                <a href="../marketplace/marketplace-items.php" class="nav-link px-3">
                                    <span class="me-2">
                                        <i class="bi bi-card-list"></i>
                                    </span>
                                    <span>View your items</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
               
                <li>
                    <a href="../tracking/tracking.php" class="nav-link px-3">
                        <span class="me-2">
                            <i class="bi bi-geo-alt-fill"></i>
                        </span>
                        <span>Tracking</span>
                    </a>
                </li>
                <li class="my-4">
                    <hr class="dropdown-divider bg-light" />
                </li>
                <li>
                    <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                        Services
                    </div>
                </li>
                <li>
                    <a href=mailto:"angelokh22@gmail.com" class="nav-link px-3">
                        <span class="me-2">
                            <i class="bi bi-envelope-fill"></i>
                        </span>
                        <span>Contact US</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

</section>
    <!-- SideBar End -->

    <!-- Edit Profile Start -->
    <section style="margin: 5rem 3rem;">
        <main>
            <div class="row g-3">

                <div class="row col-md-12">
                    <div class="col-12 text-center">
                        <h4 style="text-decoration: underline;">Edit Profile</h4>
                    </div>
                </div>

                <div class="row col-md-6  mt-5">
                    <div class="col-md-12">
                        <label for="inputfn" class="form-label">FullName:</label>
                        <input type="text" class="form-control" id="inputfn" value="<?php echo $user_result['userName']; ?>">
                    </div>
                    <div class="col-12 mt-2">
                        <label for="inputEmail" class="form-label">Email:</label>
                        <input type="text" class="form-control" id="inputEmail" value="<?php echo $user_result['userEmail']; ?>">
                    </div>
                    <div class="col-12 mt-2">
                        <label for="inputPhone" class="form-label">Phone Number:</label>
                        <input type="text" class="form-control" id="inputPhone" value="<?php echo $user_result['userPhone']; ?>">
                    </div>
                    <div class="col-12 mt-2">
                        <div style="border: 1px solid lightgray; border-radius: 8px; padding: 5px 0;">
                                <div class="mx-2">
                                    <label for="oldPass" class="form-label">Old Password:</label>
                                    <input type="text" class="form-control" id="oldPass" placeholder="Enter Old Password">
                                </div>
                                <div class="mx-2">
                                    <label for="newPass" class="form-label">New Password:</label>
                                    <input type="text" class="form-control" id="newPass" placeholder="Enter New Password">
                                </div>
                                <div class="mx-2">
                                    <label for="confPass" class="form-label">Confirm Password:</label>
                                    <input type="text" class="form-control" id="confPass" placeholder="Confirm New Password">
                                </div>
                                <div class="mt-2 mx-2">
                                    <button class="btn btn-primary" onclick="change_pass()" data-bs-toggle="modal" data-bs-target="#profileEdit">Change Password</button>
                                </div>
                        </div>
                    </div>                                 
                </div>
                <div class="row col-md-6 mt-5">
                    <div class="col-12">
                        <div style="border: 1px solid lightgray; border-radius: 8px; padding: 5px 0;">
                            <div class="mx-2 mt-4">
                                <label for="inputCity" class="form-label">City:</label>
                                <input type="text" class="form-control" id="inputCity" required value="<?php if($is_adresse) echo $adresse_result[0]['city']?>"> 
                            </div>
                            <div class="mx-2 mt-4">
                                <label for="inputTown" class="form-label">Town:</label>
                                <input type="text" class="form-control" id="inputTown" required value="<?php if($is_adresse) echo $adresse_result[0]['town']?>">
                            </div>
                            <div class="mx-2 mt-4">
                                <label for="inputPostalCode" class="form-label">Postal Code:</label>
                                <input type="text" class="form-control" id="inputPostalCode" required value="<?php if($is_adresse) echo $adresse_result[0]['postalCode']?>">
                            </div>
                            <div class="mt-2 mx-2 mt-4">
                                <label for="inputAddress1" class="form-label">Address 1:</label>
                                <input type="text" class="form-control" id="inputAddress1" required value="<?php if($is_adresse) echo $adresse_result[0]['adresse']?>">
                            </div>
                            <div class="mt-2 mx-2 mt-4 mb-4">
                                <label for="inputAddress2" class="form-label">Address 2 (Optinal):</label>
                                <input type="text" class="form-control" id="inputAddress2" value="<?php if($is_adresse) echo $adresse_result[0]['adresse2']?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row col-md-12 mt-5">
                    <div class="col-12 text-center">
                        <button class="btn btn-primary" onclick="save_changes()" data-bs-toggle="modal" data-bs-target="#profileEdit">Save Changes</button>
                    </div>
                </div>
                
            </div>
        </main>
    </section>
    <!-- Edit Profile End -->

    <!-- Update Modal Start -->
    <section>

        <div class="modal fade" id="profileEdit" tabindex="-1" aria-labelledby="profileEditLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal"><i class="fa-sharp fa-light fa-circle-check"></i></button>
            </div>
            </div>
        </div>
        </div>

    </section>
    <!-- Update Modal End -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"
        integrity="sha512-pax4MlgXjHEPfCwcJLQhigY7+N8rt6bVvWLFyUMuxShv170X53TRzGPmPkZmGBhk+jikR8WBM4yl7A9WMHHqvg=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
        </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"
        integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
        </script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script src="../../../static/js/admin/script.js"></script>
    <script>
        function save_changes(){
            var fullname = document.getElementById("inputfn").value;
            var email = document.getElementById("inputEmail").value;
            var phone = document.getElementById("inputPhone").value;
            var city = document.getElementById("inputCity").value;
            var town = document.getElementById("inputTown").value;
            var postalcode = document.getElementById("inputPostalCode").value;
            var adresse1 = document.getElementById("inputAddress1").value;
            var adresse2 = document.getElementById("inputAddress2").value;

            fetch(
                "../../../php/save_changes.php",
                {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams({
                        fullname: fullname,
                        email: email,
                        phone: phone,
                        city: city,
                        town: town,
                        postalCode: postalcode,
                        adresse1: adresse1,
                        adresse2: adresse2
                    })
                }
            )
            .then((response) => response.text())
            .then((text) => {
                if(text == "OK") {
                    document.getElementsByClassName("modal-body")[0].innerHTML = `
                    <p>Profile Informations has been updated <span class="text-success">SUCCESSFULLY!</span></p>
                    `
                }
                else {
                    document.getElementsByClassName("modal-body")[0].innerHTML = `
                    <p>Profile Informations <span class="text-danger">HAS NOT</span> been updated.</p>
                    `
                }
                $("#profileEdit").modal();
            })

        }

        function change_pass() {
            var OldPass = document.getElementById("oldPass").value;
            var NewPass = document.getElementById("newPass").value;
            var ConfPass = document.getElementById("confPass").value;

            fetch(
                "../../../php/change_pass.php",
                {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams({
                        oldPass: OldPass,
                        newPass: NewPass,
                        confPass: ConfPass
                    })
                }
            )
            .then((response) => response.text())
            .then((text) => {
                if(text == "OK") {
                    document.getElementsByClassName("modal-body")[0].innerHTML = `
                    <p>Password has been changed <span class="text-success">SUCCESSFULLY!</span></p>
                    `
                }
                else {
                    document.getElementsByClassName("modal-body")[0].innerHTML = `
                    <p>Password <span class="text-danger">HAS NOT</span> been changed.</p>
                    `
                }
                $("#profileEdit").modal();
            })
        }
    </script>


</body>

</html>