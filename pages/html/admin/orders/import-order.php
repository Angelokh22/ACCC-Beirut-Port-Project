<?php include "../../../php/check_login.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-thin.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-light.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css" />
    <link rel="stylesheet" href="../../../../static/css/admin/panel.css">
    <link rel="stylesheet" href="../../../../static/css/admin/import-order.css">
    <title>ACCC Beirut Port Prject</title>
</head>

<body>

    <!-- NavBar Start -->
    <section>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="offcanvasExample">
                    <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
                </button>

                <a class="navbar-brand theme-text" href="../../../../index.php">
                    <img src="../../../../static/img/logo-only.png" alt="ACCC LOGO" id="brand-logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar" aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="topNavBar">
                    <ul class="d-flex ms-auto navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://static-00.iconduck.com/assets.00/person-fill-icon-481x512-40cd90q6.png" alt="PFP" id="pfp-logo">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><span class="dropdown-item greatings" href="#">Hello, <span id="name">Admin</span></span></li>
                                <li><a class="dropdown-item" href="../edit profile/editprofile.php">Edit Profile</a></li>
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
                            <div class="collapse show" id="orders">
                                <ul class="navbar-nav ps-3">
                                    <li>
                                        <a href="import-order.php" class="nav-link px-3 active">
                                            <span class="me-2">
                                                <!-- <i class="bi bi-card-list"></i> -->
                                                <i class="fa-solid fa-arrow-left fa-xs"></i>
                                                <i class="fa-solid fa-box"></i>
                                            </span>
                                            <span>Imported Orders</span>
                                        </a>
                                        <a href="export-order.php" class="nav-link px-3">
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
                                        <a href="../marketplace/marketplace-list.php" class="nav-link px-3">
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
                            <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#users">
                                <span class="me-2">
                                    <i class="bi bi-person-fill"></i>
                                </span>
                                <span>Users</span>
                                <span class="ms-auto">
                                    <span class="right-icon">
                                        <i class="bi bi-chevron-down"></i>
                                    </span>
                                </span>
                            </a>
                            <div class="collapse" id="users">
                                <ul class="navbar-nav ps-3">
                                    <li>
                                        <a href="../users/admin.php" class="nav-link px-3">
                                            <span class="me-2">
                                                <i class="fa-solid fa-user-shield"></i>
                                            </span>
                                            <span>Admin</span>
                                        </a>
                                        <a href="../users/worker.php" class="nav-link px-3">
                                            <span class="me-2">
                                                <i class="fa-solid fa-helmet-safety"></i>
                                            </span>
                                            <span>Workers</span>
                                        </a>
                                        <a href="../users/user.php" class="nav-link px-3">
                                            <span class="me-2">
                                                <i class="fa-solid fa-user"></i>
                                            </span>
                                            <span>Members</span>
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
                                Database
                            </div>
                        </li>
                        <li>
                            <a href="../database/send-query.php" class="nav-link px-3">
                                <span class="me-2">
                                    <i class="fa-regular fa-keyboard"></i>
                                </span>
                                <span>Send Query</span>
                            </a>
                        </li>
                        <li class="my-4">
                            <hr class="dropdown-divider bg-light" />
                        </li>
                        <li>
                            <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                                News Letters
                            </div>
                        </li>
                        <li>
                            <a href="../newsletter/newsletter.php" class="nav-link px-3">
                                <span class="me-2">
                                <i class="fa-regular fa-paper-plane"></i>
                                </span>
                                <span>Send News Letters</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

    </section>
    <!-- SideBar End -->

    <!-- Orders Start -->
    <section>
        <main>
            <div id="canvas">
                <canvas id="LineChart" width="400" height="100"></canvas>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <span>
                                <i class="bi bi-table me-2"></i>
                            </span>
                            Imported orders in progress
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped data-table" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Tracking Number</th>
                                            <th>Service</th>
                                            <th>Rent Cargo</th>
                                            <th>Category</th>
                                            <th>Delivery type</th>
                                            <th>Price</th>
                                            <th>Weight</th>
                                            <th>From</th>
                                            <th>Destination</th>
                                            <th>Depart Time</th>
                                            <th>Arrival Time</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $query = "SELECT * FROM Orders WHERE Destination  = 'Lebanon';";
                                        $result = send_query($query, true, true, []);
                                        if ($result) {
                                            foreach ($result as $row) {
                                                $userid = $row['userID'];
                                                $destination = $row['Destination'];
                                                $from = $row['From'];
                                                $service = $row['Service'];
                                                $rent_Cargo = $row['Rent Cargo'];
                                                $type = $row['Categorie'];
                                                $deliveryType = $row['deliveryProvider'];
                                                $weight = $row['weight'];
                                                $price = $row['calculatedPrice'];
                                                $orderID = $row['orderID'];
                                                date_default_timezone_set('Asia/Beirut');
                                                $ArrivalTime =  date('d/m/Y h-i-s a', $row['ArrivalTime']);
                                                $DepartTime = date('d/m/Y h-i-s a', $row['DepartTime']);
                                                $stopped = $row['Stopped'];
                                                if ($stopped == "0") {
                                                    $button = "<button class='btn bg-danger' onclick = 'stop_item(this)'>Stop</button>";
                                                } else {
                                                    $button = "<button class='btn bg-success' onclick = 'unstop_item(this)'>Unstop</button>";
                                                }

                                                echo "<tr>
                                                    <th>$userid</th>
                                                    <th>$orderID</th>
                                                    <th>$service</th>
                                                    <th>$rent_Cargo</th>
                                                    <th>$type</th>
                                                    <th>$deliveryType</th>
                                                    <th>$price</th>
                                                    <th>$weight</th>
                                                    <th>$from</th>    
                                                    <th>$destination</th>                                                                
                                                    <th>$DepartTime</th>  
                                                    <th>$ArrivalTime</th>
                                                    <th>$button</th>                                                    

                                                </tr>";
                                            }
                                        }

                                        ?>

                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Tracking Number</th>
                                            <th>Service</th>
                                            <th>Rent Cargo</th>
                                            <th>Category</th>
                                            <th>Delivery type</th>
                                            <th>Price</th>
                                            <th>Weight</th>
                                            <th>From</th>
                                            <th>Destination</th>
                                            <th>Depart Time</th>
                                            <th>Arrival Time</th>
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
    <!-- Orders End -->

    <!-- Success Modal Start -->
    <section>

        <div class="modal fade" id="popupModal" tabindex="-1" aria-labelledby="popupModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-success" data-bs-dismiss="modal"><i class="fa-sharp fa-light fa-circle-check"></i></button> -->
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Success Modal End -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js" integrity="sha512-pax4MlgXjHEPfCwcJLQhigY7+N8rt6bVvWLFyUMuxShv170X53TRzGPmPkZmGBhk+jikR8WBM4yl7A9WMHHqvg==" crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script src="../../../../static/js/admin/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('LineChart');

        fetch(
            "../../../php/chart_import.php",
            {
                method: 'GET'
            }
        )
        .then(response => (response.json()))
        .then(response => {
            if(response['success'] == true){
                var chartValue = response['value'];
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['january', 'february', 'march', 'april', 'may', 'june', 'jully', 'august', 'september', 'october', 'november', 'december'],
                        datasets: [{
                            label: '# Imported Orders',
                            data: chartValue,
                            borderWidth: 3,
                            fill: true,
                            tension: 0.2
                        }]
                    }
                });
            }
        })

    </script>

    <script>

        function stop_item(button) {

            const orderDIV = button.parentNode.parentNode;
            let orderid = orderDIV.getElementsByTagName("th")[1].innerText;


            fetch(
                    "../../../php/stop_item.php", {
                        method: "POST",
                        body: new URLSearchParams({
                            orderID: orderid
                        })
                    }
                )
                .then(response => (response.json()))
                .then(response => {
                    if (response['success'] == true) {
                        button.classList.remove("bg-danger")
                        button.classList.add("bg-success")
                        button.innerText = "Unstop"

                        let message = response['message'];

                        let popup = document.getElementById("popupModal")
                        popup.getElementsByClassName("modal-body")[0].innerHTML = `<p>${message}</p>`
                        popup.getElementsByClassName("modal-footer")[0].innerHTML = `<button type="button" class="btn btn-success" data-bs-dismiss="modal"><i class="fa-sharp fa-light fa-circle-check"></i></button>`;
                        button.onclick = function () { unstop_item(this); };
                        $("#popupModal").modal('show')
                    } else {
                        let error = response['error'];

                        let popup = document.getElementById("popupModal")
                        popup.getElementsByClassName("modal-body")[0].innerHTML = `<p>${error}</p>`
                        popup.getElementsByClassName("modal-footer")[0].innerHTML = `<button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-sharp fa-light fa-circle-xmark"></i></button>`;
                        $("#popupModal").modal('show')
                    }

                })

        }

        function unstop_item(button) {

            const orderDIV = button.parentNode.parentNode;
            let orderid = orderDIV.getElementsByTagName("th")[1].innerText;


            fetch(
                    "../../../php/unstop_item.php", {
                        method: "POST",
                        body: new URLSearchParams({
                            orderID: orderid
                        })
                    }
                )
                .then(response => (response.json()))
                .then(response => {
                    if (response['success'] == true) {
                        button.classList.remove("bg-success")
                        button.classList.add("bg-danger")
                        button.innerText = "Stop"

                        let message = response['message'];

                        let popup = document.getElementById("popupModal")
                        popup.getElementsByClassName("modal-body")[0].innerHTML = `<p>${message}</p>`
                        popup.getElementsByClassName("modal-footer")[0].innerHTML = `<button type="button" class="btn btn-success" data-bs-dismiss="modal"><i class="fa-sharp fa-light fa-circle-check"></i></button>`;
                        button.onclick = function () { stop_item(this); };
                        $("#popupModal").modal('show')
                    } else {
                        let error = response['error'];

                        let popup = document.getElementById("popupModal")
                        popup.getElementsByClassName("modal-body")[0].innerHTML = `<p>${error}</p>`
                        popup.getElementsByClassName("modal-footer")[0].innerHTML = `<button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-sharp fa-light fa-circle-xmark"></i></button>`;
                        $("#popupModal").modal('show')
                    }

                })

        }
    </script>


</body>

</html>