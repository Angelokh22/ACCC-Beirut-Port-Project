<?php  include "../../php/check_login.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css"
        integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css"
        integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css" />
    <link rel="stylesheet" href="../../../static/css/admin/panel.css">
    <link rel="stylesheet" href="../../../static/css/worker/email.css">
    <link rel="shortcut icon" href="../../../static/img/favicon.ico" type="image/x-icon">
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

                <a class="navbar-brand theme-text" href="../../../index.php">
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
                                <li><a class="dropdown-item" href="./edit profile/editprofile.php">Edit Profile</a></li>
                                <li>
                                    <a class="dropdown-item" href="../../php/logout.php">Log Out</a>
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
                            <a href="../worker/dashboard.php" class="nav-link px-3 active">
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
                                        <a href="../worker/orders/import-order.php" class="nav-link px-3">
                                            <span class="me-2">
                                                <!-- <i class="bi bi-card-list"></i> -->
                                                <i class="fa-solid fa-arrow-left fa-xs"></i>
                                                <i class="fa-solid fa-box"></i>
                                            </span>
                                            <span>Imported Orders</span>
                                        </a>
                                        <a href="../worker/orders/export-order.php" class="nav-link px-3">
                                            <span class="me-2">
                                                <!-- <i class="bi bi-card-list"></i> -->
                                                <i class="fa-solid fa-box"></i>
                                                <i class="fa-solid fa-arrow-right fa-xs"></i>
                                            </span>
                                            <span>Exported Orders</span>
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
                                        <a href="../worker/marketplace/marketplace-list.php" class="nav-link px-3">
                                            <span class="me-2">
                                                <i class="bi bi-card-list"></i>
                                            </span>
                                            <span>View Market List</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <a href="../worker/tracking/tracking.php" class="nav-link px-3">
                                <span class="me-2">
                                    <i class="bi bi-geo-alt-fill"></i>
                                </span>
                                <span>Tracking</span>
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>

    </section>
    <!-- SideBar End -->

    <!-- Dashboard Start-->
    <section>
        <main>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 my-2">
                        <h4>Dashboard</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body row">
                                <div class="info col-8">
                                    <h3><?php echo send_query("SELECT count(*) FROM Ships WHERE shipStatus = 1;", true,false,[])[0]; ?></h3>
                                    <span>Arriving ships</span>
                                </div>
                                <div class="col icon">
                                    <i class="fas fa-arrow-square-down"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card bg-warning text-white">
                            <div class="card-body row">
                                <div class="info col-8">
                                    <h3><?php echo send_query("SELECT count(*) FROM Ships WHERE shipStatus = 2;", true,false,[])[0]; ?></h3>
                                    <span>Leaving ships</span>
                                </div>
                                <div class="col icon">
                                    <i class="fas fa-arrow-square-up"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card bg-success text-white">
                            <div class="card-body row">
                                <div class="info col-8">
                                    <h3><?php echo send_query("SELECT count(*) FROM Ships WHERE shipOnPort = 1;", true,false,[])[0]; ?></h3>
                                    <span>On-Port ships</span>
                                </div>
                                <div class="col icon">
                                    <!-- <i class="fa-solid fa-cart-shopping"></i> -->
                                    <img src="../../../static/img/lifter.webp" alt="" class="icon" width="55px"
                                        height="55px" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card bg-danger text-white">
                            <div class="card-body row">
                                <div class="info col-8">
                                    <h3><?php echo send_query("SELECT count(*) FROM OwnShips;", true,false,[])[0]; ?></h3>
                                    <span>Total Owned ships</span>
                                </div>
                                <div class="col icon">
                                    <img src="../../../static/img/ferry-boat.webp" alt="" class="icon" width="55px"
                                        height="55px" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- arriving time table -->
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped data-table" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Ship Name</th>
                                <th>Containers</th>
                                <th>Arrival Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                $query = "SELECT * FROM Ships WHERE shipStatus = 1;";
                                $result = send_query($query, true, true, []);
                                if($result) {
                                    foreach($result as $row){
                                    $name = $row['shipName'];
                                    $cargo = $row['shipCargo'];
                                    date_default_timezone_set('Asia/Beirut');
                                    $time =  date('d/m/Y h-i-s a', $row['shipArrival']);

                                    echo "<tr>
                                            <th>$name</th>
                                            <th>$cargo</th>
                                            <th>$time</th>
                                        </tr>";
                                    }
                                }

                            ?>
                          
                        <tfoot>
                            <tr>
                                <th>Ship Name</th>
                                <th>Containers</th>
                                <th>Arrival Time</th>
                            </tr>

                        </tfoot>
                    </table>
                </div>
            </div>
            <!-- end arriving time table -->

            <!-- departing time table -->



            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped data-table" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Ship Name</th>
                                <th>Containers</th>
                                <th>Depart Time</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php 
                                 $query = "SELECT * FROM Ships WHERE shipStatus = 2;";
                                 $result = send_query($query, true, true, []);
                                 if($result) {
                                    foreach($result as $row){
                                        $name = $row['shipName'];
                                        $cargo = $row['shipCargo'];
                                        date_default_timezone_set('Asia/Beirut');
                                        $time =  date('d/m/Y h-i-s a', $row['shipArrival']);
    
                                        echo "<tr>
                                                <th>$name</th>
                                                <th>$cargo</th>
                                                <th>$time</th>
                                            </tr>";
                                        }
                                 }
                                
                                ?>

                        <tfoot>
                            <tr>
                                <th>Ship Name</th>
                                <th>Containers</th>
                                <th>Depart Time</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>



            <!-- end departing time table -->
            <!-- starting inbox -->

            <div class="row">
                <div class="col-md-12 my-2" style="margin-left: 10px;">
                    <h4>Inbox</h4>
                </div>
            </div>

            <div class="container inbox-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-inbox">

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active show" id="inbox" aria-labelledby="inbox-tab"
                                    role="tabpanel">
                                    <div>


                                        <div class="table-responsive">
                                            <table class="table email-table no-wrap table-hover v-middle mb-0 font-14">
                                                <tbody>

                                                    <tr>
                                                        <td class="pl-3"></td>
                                                        <td>
                                                            <span class="mb-0 text-muted">Hritik Roshan</span>
                                                        </td>
                                                        <td>
                                                            <a class="link" href="">
                                                                <span
                                                                    class="badge badge-pill text-white font-medium badge-danger mr-2">Admin</span>
                                                                <span class="text-dark">Lorem ipsum perspiciatis-</span>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-primary">
                                                                Open mail <i class="bi bi-send-fill"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pl-3"></td>
                                                        <td>
                                                            <span class="mb-0 text-muted">Hritik Roshan</span>
                                                        </td>
                                                        <td>
                                                            <a class="link" href="">
                                                                <span
                                                                    class="badge badge-pill text-white font-medium badge-info mr-2">Worker</span>
                                                                <span class="text-dark">Lorem ipsum perspiciatis-</span>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-primary">
                                                                Open mail <i class="bi bi-send-fill"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pl-3"></td>
                                                        <td>
                                                            <span class="mb-0 text-muted">Hritik Roshan</span>
                                                        </td>
                                                        <td>
                                                            <a class="link" href="">
                                                                <span
                                                                    class="badge badge-pill text-white font-medium badge-success mr-2">Member</span>
                                                                <span class="text-dark">Lorem ipsum perspiciatis-</span>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-primary">
                                                                Open mail <i class="bi bi-send-fill"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pl-3"></td>
                                                        <td>
                                                            <span class="mb-0 text-muted">Hritik Roshan</span>
                                                        </td>
                                                        <td>
                                                            <a class="link" href="">
                                                                <span
                                                                    class="badge badge-pill text-white font-medium badge-warning mr-2">Unckown</span>
                                                                <span class="text-dark">Lorem ipsum perspiciatis-</span>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-primary">
                                                                Open mail <i class="bi bi-send-fill"></i>
                                                            </button>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- ending inbox -->

        </main>

    </section>
    <!-- Dashboard End-->

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
    <script src="../../../../static/js/admin/script.js"></script>


</body>

</html>