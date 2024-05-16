<?php
    include "../../php/tools.php";

    session_start();
    $jwt = $_SESSION['Authorisation'];

    $query = "SELECT * FROM Sessions WHERE sessionToken = '$jwt'";

    $result = send_query($query, false);
    if(!$result) {
        session_destroy();
        header("Location: ../../../index.html");
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
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css" />
    <link rel="stylesheet" href="../../../static/css/admin/panel.css">
    <link rel="stylesheet" href="../../../static/css/member/dashboard.css">
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
                
                <a class="navbar-brand theme-text" href="../../../index.html">
                    <img src="../../../static/img/logo-only.png" alt="ACCC LOGO" id="brand-logo">
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
                                <img src="https://static-00.iconduck.com/assets.00/person-fill-icon-481x512-40cd90q6.png" alt="PFP" id="pfp-logo">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><span class="dropdown-item greatings" href="#">Hello, <span id="name">
                                    <?php
                                        $result = read_jwt($jwt);
                                        echo $result['name'];
                                    ?>
                                    </span></span></li>
                                <li><a class="dropdown-item" href="#">Edit Profile</a></li>
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
                            <a href="dashboard.html" class="nav-link px-3 active">
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
                                        <a href="./orders/import-export.html" class="nav-link px-3">
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
                                        <a href="./marketplace/marketplace-list.html" class="nav-link px-3">
                                            <span class="me-2">
                                                <i class="bi bi-card-list"></i>
                                            </span>
                                            <span>View Market List</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="./marketplace/marketplace-items.html" class="nav-link px-3">
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
                            <a href="./tracking/tracking.html" class="nav-link px-3">
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

    <!-- Dashboard Start-->
    <section>
        <main class="mt-5 pt-3">
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
                                    <h3>100K</h3>
                                    <span>Importing</span>
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
                                    <h3>23K</h3>
                                    <span>Exporting</span>
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
                                    <h3>10K</h3>
                                    <span>Market Items</span>
                                </div>
                                <div class="col icon">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card bg-danger text-white">
                            <div class="card-body row">
                                <div class="info col-8">
                                    <h3>100M</h3>
                                    <span>Market Income</span>
                                </div>
                                <div class="col icon">
                                    <i class="bi bi-box-seam"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="canvas">
                <canvas id="LineChart" height="100"></canvas>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <span>
                                <i class="bi bi-table me-2"></i>
                            </span>
                            Active Orders
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped data-table" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Pictures</th>
                                            <th>Destination</th>
                                            <th>Service</th>
                                            <th>Rented Cargo</th>
                                            <th>Type</th>
                                            <th>Weight</th>
                                            <th>Price</th>
                                            <th>Depart Time</th>
                                            <th>Arrival Time</th>
                                            <th>Tracking Number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th><img src="" alt="picture"></th>
                                            <th>Beirut Port, LB</th>
                                            <th>Door to Door</th>
                                            <th>Yes</th>
                                            <th>Import</th>
                                            <th>1000Kg</th>
                                            <th>6524$</th>
                                            <th>14/04/2024</th>
                                            <th>24/05/2024</th>
                                            <th>1Z34E5D6TRWK8721A3</th>
                                        </tr>
                                        <tr>
                                            <th><img src="" alt="picture"></th>
                                            <th>France</th>
                                            <th>Quay to Quay</th>
                                            <th>No</th>
                                            <th>Export</th>
                                            <th>5000Kg</th>
                                            <th>10000$</th>
                                            <th>30/04/2024</th>
                                            <th>12/06/2024</th>
                                            <th>1Z34E5D6TRWK8721A3</th>
                                        </tr>
                                    <tfoot>
                                        <tr>
                                            <th>Pictures</th>
                                            <th>Destination</th>
                                            <th>Service</th>
                                            <th>Rented Cargo</th>
                                            <th>Type</th>
                                            <th>Weight</th>
                                            <th>Price</th>
                                            <th>Depart Time</th>
                                            <th>Arrival Time</th>
                                            <th>Tracking Number</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <span>
                                <i class="bi bi-table me-2"></i>
                            </span>
                            Active MarketPlace Items
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped data-table" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Pictures</th>
                                            <th>ID</th>
                                            <th>Price</th>
                                            <th>Added Date</th>
                                            <th>Viewers</th>
                                            <th>Expiry Date</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th><img src="" alt="picture"></th>
                                            <th>952</th>
                                            <th>300$</th>
                                            <th>12/02/2024</th>
                                            <th>42</th>
                                            <th>12/02/2025</th>
                                            <th>
                                                <button class="edt_btn btn">
                                                    <i class="fa-regular fa-pencil"></i>
                                                </button>
                                                <button class="show_btn btn">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th><img src="" alt="picture"></th>
                                            <th>1000</th>
                                            <th>500$</th>
                                            <th>20/04/2024</th>
                                            <th>42</th>
                                            <th>20/04/2025</th>
                                            <th>
                                                <button class="edt_btn btn">
                                                    <i class="fa-regular fa-pencil"></i>
                                                </button>
                                                <button class="show_btn btn">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                            </th>
                                        </tr>
                                    <tfoot>
                                        <tr>
                                            <th>Pictures</th>
                                            <th>ID</th>
                                            <th>Price</th>
                                            <th>Added Date</th>
                                            <th>Viewers</th>
                                            <th>Expiry Date</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../../../static/js/admin/script.js"></script>
    

    <script>
        const ctx = document.getElementById('LineChart');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['january', 'february', 'march', 'april', 'may', 'june', 'jully', 'august', 'september', 'october', 'november','december'],
                datasets: [{
                    label: '# Market Income',
                    data: [3891,7402,2056,9123,5548,2371,0,0,0,0,0,0],
                    borderWidth: 3,
                    fill: true,
                    tension: 0.2,
                    borderColor: 'red',
                    backgroundColor: 'rgba(255, 0, 0, .5)',
                }]
            }
        });
    </script>

</body>

</html>