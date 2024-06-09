<?php include "../../../php/check_login.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css"
        integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-thin.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-light.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css" />
    <link rel="stylesheet" href="../../../../static/css/admin/panel.css">
    <link rel="stylesheet" href="../../../../static/css/worker/tracking.css">
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
                                <li><span class="dropdown-item greatings" href="#">Hello, <span
                                            id="name">Admin</span></span></li>
                                <li><a class="dropdown-item" href="../edit profile/editprofile.php">Edit Profile</a>
                                </li>
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
                                        <a href="../orders/import-order.php" class="nav-link px-3">
                                            <span class="me-2">
                                                <!-- <i class="bi bi-card-list"></i> -->
                                                <i class="fa-solid fa-arrow-left fa-xs"></i>
                                                <i class="fa-solid fa-box"></i>
                                            </span>
                                            <span>Imported Orders</span>
                                        </a>
                                        <a href="../orders/export-order.php" class="nav-link px-3">
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
                            <a href="tracking.php" class="nav-link px-3 active">
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
                                <span>Send News Letter</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

    </section>
    <!-- SideBar End -->

    <!-- Tracking Start -->
    <section>
        <main>

            <div class="title">
                <h2>Track Your Order</h2>
            </div>

            <div class="infos">
                <span>Enter your Tracking ID below:</span>
                <div class="inputs">
                    <input type="text" placeholder="Tracking ID" id="track_id" />
                    <button onclick="checkID()">Send</button>
                </div>
            </div>

            <link rel="stylesheet"
                href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
            <div class="container padding-bottom-3x mb-1">
                <div class="card mb-3">
                    <div class="p-4 text-center text-white text-lg bg-dark rounded-top">
                        <span class="text-uppercase">Tracking Order No - </span>
                        <span class="text-medium" id="tracking_number"></span>
                    </div>
                    <div class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-3 px-2 bg-secondary">
                        <div class="w-100 text-center py-1 px-2">
                            <span class="text-medium">From:</span>
                            <p id="from_location"></p>
                        </div>
                        <div class="w-100 text-center py-1 px-2">
                            <span class="text-medium">To:</span>
                            <p id="to_location"></p>
                        </div>
                        <div class="w-100 text-center py-1 px-2">
                            <span class="text-medium">Delivered With:</span>
                            <p id="delivery_type"></p>
                        </div>
                        <div class="w-100 text-center py-1 px-2">
                            <span class="text-medium">Shipment Type:</span>
                            <p id="delivery_provider"></p>
                        </div>
                        <div class="w-100 text-center py-1 px-2">
                            <span class="text-medium">Status:</span>
                            <p id="status"></p>
                        </div>
                        <div class="w-100 text-center py-1 px-2">
                            <span class="text-medium">Expected Date:</span>
                            <p id="delivery_time"></p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div
                            class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                            <div class="step">
                                <div class="step-icon-wrap">
                                    <div class="step-icon">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                    </div>
                                </div>
                                <h4 class="step-title">Confirmed Order</h4>
                            </div>
                            <div class="step">
                                <div class="step-icon-wrap">
                                    <div class="step-icon">
                                        <i class="bi bi-gear-fill"></i>
                                    </div>
                                </div>
                                <h4 class="step-title">Processing Order</h4>
                            </div>
                            <div class="step">
                                <div class="step-icon-wrap">
                                    <div class="step-icon">
                                        <i class="fa-solid fa-shield"></i>
                                    </div>
                                </div>
                                <h4 class="step-title">Security Check</h4>
                            </div>
                            <div class="step">
                                <div class="step-icon-wrap">
                                    <div class="step-icon">
                                        <i class="fa-solid fa-ship"></i>
                                    </div>
                                </div>
                                <h4 class="step-title">Product Dispatched</h4>
                            </div>
                            <div class="step">
                                <div class="step-icon-wrap">
                                    <div class="step-icon">
                                        <i class="fa-solid fa-anchor"></i>
                                    </div>
                                </div>
                                <h4 class="step-title">Store House</h4>
                            </div>
                            <div class="step">
                                <div class="step-icon-wrap">
                                    <div class="step-icon">
                                        <i class="fa-solid fa-handshake"></i>
                                    </div>
                                </div>
                                <h4 class="step-title">Product Delivered</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </section>
    <!-- Tracking End -->

    <!-- Live Map Start -->
    <section>
        <main class="mt-1 text-center">
            <iframe
                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyD4iE2xVSpkLLOXoyqT-RuPwURN3ddScAI&q=33.902970918564996,35.51771813153476&zoom=19&maptype=satellite"
                width="95%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
        </main>

    </section>
    <!-- Live Map End -->

    <!-- Error Modal Start -->
    <section>

        <div class="modal fade" id="errormodal" tabindex="-1" aria-labelledby="errormodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i
                                class="fa-solid fa-circle-xmark"></i></button>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Error Modal End -->

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

    <script>
        function checkID() {
            var trackingid = document.getElementById("track_id").value;

            fetch(
                "../../../php/check_track_id.php",
                {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams({
                        trackingid: trackingid
                    })
                }
            )
                .then((response) => response.text())
                .then((text) => {
                    if (text == "NO") {
                        document.getElementsByClassName("modal-body")[0].innerHTML = `
                    <p>Tracking ID does <span class="text-danger">NOT EXIST!</span></p>
                    `
                        $("#errormodal").modal('show');
                    }
                    else {

                        var result = JSON.parse(text);

                        document.getElementById("tracking_number").innerText = result['trackingNumber'];
                        document.getElementById("from_location").innerText = result['from'];
                        document.getElementById("to_location").innerText = result['destination'];
                        document.getElementById("delivery_provider").innerText = result['shipmentType'];
                        document.getElementById("delivery_time").innerText = result['deleveryTime'];
                        document.getElementById("delivery_type").innerText = result['deliveryProvider'];
                        document.getElementById("status").innerText = result['status'];

                        var steps = document.getElementsByClassName("step");
                        for (var i = 0; i <= result['statusIndex']; i++) {
                            steps[i].classList.add("completed");
                        }
                    }
                })

        }

    </script>



</body>

</html>