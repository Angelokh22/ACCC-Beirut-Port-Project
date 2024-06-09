<?php include "../../../php/check_login.php" ?><!DOCTYPE html>


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
    <link rel="stylesheet" href="../../../../static/css/admin/admin.css">
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
                            <div class="collapse show" id="users">
                                <ul class="navbar-nav ps-3">
                                    <li>
                                        <a href="admin.php" class="nav-link px-3">
                                            <span class="me-2">
                                                <i class="fa-solid fa-user-shield"></i>
                                            </span>
                                            <span>Admin</span>
                                        </a>
                                        <a href="worker.php" class="nav-link px-3 active">
                                            <span class="me-2">
                                                <i class="fa-solid fa-helmet-safety"></i>
                                            </span>
                                            <span>Workers</span>
                                        </a>
                                        <a href="user.php" class="nav-link px-3">
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
        <main class="mt-5 pt-3">

            <div class="btn btn-add">
                <button data-bs-toggle="modal" data-bs-target="#addAdmin">
                    Add Worker <i class="fa-solid fa-plus"></i>
                </button>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-box clearfix">
                            <div class="table-responsive">
                                <table class="table user-list">
                                    <thead>
                                        <tr>
                                            <th><span>User</span></th>
                                            <th><span>Created</span></th>
                                            <th class="text-center"><span>Status</span></th>
                                            <th><span>Email</span></th>
                                            <th><span>Phone</span></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                            $result = send_query("SELECT * FROM Users WHERE userRole = '2'");
                                            foreach ($result as $row) {
                                                $userid = $row['userID'];
                                                $name = $row['userName'];
                                                $email = $row['userEmail'];
                                                $date = date('Y/m/d', $row['userCreated']);
                                                $status = "";
                                                $phone = $row['userPhone'];

                                                if($row['userStatus'] == 0) {
                                                    $status = 'Pending';
                                                }
                                                else if($row['userStatus'] == 1) {
                                                    $status = 'Active';
                                                }
                                                else {
                                                    $status = 'Banned';
                                                }

                                                echo "
                                                <tr id='user-$userid'>
                                                    <td>
                                                        <img src='https://static-00.iconduck.com/assets.00/person-fill-icon-481x512-40cd90q6.png' alt=''>
                                                        <a href='#' class='user-link'>$name</a>
                                                        <span class='user-subhead'>Worker</span>
                                                    </td>
                                                    <td>$date</td>
                                                    <td class='text-center'>
                                                        <span class='label label-default'>$status</span>
                                                    </td>
                                                    <td>
                                                        <a href='#'><span class=''>$email</span></a>
                                                    </td>
                                                    <td>$phone</td>
                                                    <td style='width: 20%;'>
                                                        <button class='btn btn-primary' onclick='edit_modal_fill(this)'>
                                                            <i class='fa fa-pencil fa-stack-1x fa-inverse' style='position: relative'></i>
                                                        </button>
                                                        <button class='btn btn-danger' onclick='delete_worker(this)'>
                                                            <i class='fa fa-trash fa-stack-1x fa-inverse' style='position: relative'></i>
                                                        </button>
                                                    </td>
                                                </tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </main>
    </section>
    <!-- Orders End -->

    <!-- Add Worker Modal Start -->
    <section>

        <div class="modal fade" id="addAdmin" tabindex="-1" aria-labelledby="addAdminLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="fullnameinp">Full Name:</label>
                            </div>
                            <div class="col-md-6">
                                <label for="emailinp">Email:</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="fullnameinp">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="emailinp">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="passwrodinp">Password:</label>
                            </div>
                            <div class="col-md-6">
                                <label for="phoneinp">Phone Number:</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="passwrodinp">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="phoneinp">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" onclick="add_worker()">
                            <i class="fa-sharp fa-light fa-circle-check"></i>
                        </button>
                        <button class="btn btn-danger" data-bs-dismiss="modal">
                            <i class="fa-sharp fa-light fa-circle-xmark"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Add Worker Modal End -->


    <!-- Edit Worker Modal Start -->
    <section>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <input type="text" id="user-id" hidden>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="fullnameinpedit">Full Name:</label>
                            </div>
                            <div class="col-md-6">
                                <label for="emailinpedit">Email:</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="fullnameinpedit">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="emailinpedit">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="passwrodinpedit">Password:</label>
                            </div>
                            <div class="col-md-6">
                                <label for="phoneinpedit">Phone Number:</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="passwrodinpedit">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="phoneinpedit">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mt-2">
                                <label for="statusedit">Status:</label>
                            </div>
                            <div class="col-md-6 mt-2">
                                <button class="btn btn-success" onclick="change_status(this)" name="statusedit"></button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" onclick="edit_worker()">
                            <i class="fa-sharp fa-light fa-circle-check"></i>
                        </button>
                        <button class="btn btn-danger" data-bs-dismiss="modal">
                            <i class="fa-sharp fa-light fa-circle-xmark"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Edit Worker Modal End -->


    <!-- POPUP Modal Start -->
    <section>

        <div class="modal fade" id="popupModal" tabindex="-1" aria-labelledby="popupModalLabel" aria-hidden="true">
        <div class="modal-dialog"> <!-- modal-dialog-centered"> -->
            <div class="modal-content">
            <div class="modal-body">
            </div>
            <div class="modal-footer">
            </div>
            </div>
        </div>
        </div>

    </section>
    <!-- POPUP Modal End -->

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

        function change_status(button) {
            const statusBTN = button.classList[1];
            if(statusBTN == "btn-success") {
                button.classList.remove("btn-success");
                button.classList.add("btn-danger");
                button.innerText = "Banned";
            }
            else {
                button.classList.remove("btn-danger");
                button.classList.add("btn-success");
                button.innerText = "Active";
            }
        }



        function edit_modal_fill(button) {

            const tableROW = button.parentNode.parentNode;
            let userid = tableROW.getAttribute("id");

            const Modal = document.getElementById("editModal");

            var name = tableROW.getElementsByTagName("a")[0].innerText;
            var status = tableROW.getElementsByTagName("span")[1].innerText;
            var email = tableROW.getElementsByTagName("span")[2].innerText;
            var phone = tableROW.getElementsByTagName("td")[4].innerText;

            document.getElementById("user-id").value = userid;
            document.getElementsByName("fullnameinpedit")[0].value = name;
            document.getElementsByName("emailinpedit")[0].value = email;
            document.getElementsByName("passwrodinpedit")[0].value = "";
            document.getElementsByName("phoneinpedit")[0].value = phone;
            
            if(status == "Active"){
                Modal.getElementsByClassName("modal-body")[0].getElementsByClassName("btn")[0].classList.remove("btn-danger")
                Modal.getElementsByClassName("modal-body")[0].getElementsByClassName("btn")[0].classList.add("btn-success")
                Modal.getElementsByClassName("modal-body")[0].getElementsByClassName("btn")[0].innerText = "Active"
            }
            else{
                Modal.getElementsByClassName("modal-body")[0].getElementsByClassName("btn")[0].classList.remove("btn-success")
                Modal.getElementsByClassName("modal-body")[0].getElementsByClassName("btn")[0].classList.add("btn-danger")
                Modal.getElementsByClassName("modal-body")[0].getElementsByClassName("btn")[0].innerText = "Banned"
            }

            $("#editModal").modal('show');


        }



        function edit_worker() {

            var userid = document.getElementById("user-id").value;
            var name = document.getElementsByName("fullnameinpedit")[0].value
            var email = document.getElementsByName("emailinpedit")[0].value
            var password = document.getElementsByName("passwrodinpedit")[0].value
            var phone = document.getElementsByName("phoneinpedit")[0].value
            var statusBtn = document.getElementsByName("statusedit")[0].innerText;

            var status = 0;
            if (statusBtn == "Active"){
                status= 1;
            }
            else {
                status = 0;
            }


            fetch(
                "../../../php/manage_worker.php",
                {
                    method: 'POST',
                    body: new URLSearchParams({
                        'action': 'edit',
                        'id': userid.split("-")[1],
                        'name': name,
                        'email': email,
                        'phone': phone,
                        'password': password,
                        'status': status
                    })
                }
            )
            .then(response => (response.json()))
            .then(response => {
                if(response['success'] != true) {
                    document.getElementById("popupModal").getElementsByClassName("modal-body")[0].innerText = response['error'];
                    document.getElementById("popupModal").getElementsByClassName("modal-footer")[0].innerHTML = `<button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-sharp fa-light fa-circle-xmark"></i></button>`;
                    $("#editModal").modal("hide");
                    $("#popupModal").modal('show');
                }
                else {

                    if (statusBtn == "Active"){
                        document.getElementById(userid).getElementsByTagName("span")[1].innerText = "Active";
                    }
                    else {
                        document.getElementById(userid).getElementsByTagName("span")[1].innerText = "Banned";
                    }

                    document.getElementById(userid).getElementsByTagName("a")[0].innerText = name;
                    document.getElementById(userid).getElementsByTagName("span")[2].innerText = email;
                    document.getElementById(userid).getElementsByTagName("td")[4].innerText = phone;

                    document.getElementById("popupModal").getElementsByClassName("modal-body")[0].innerText = response['message'];
                    document.getElementById("popupModal").getElementsByClassName("modal-footer")[0].innerHTML = `<button type="button" class="btn btn-success" data-bs-dismiss="modal"><i class="fa-sharp fa-light fa-circle-check"></i></button>`;
                    $("#editModal").modal("hide");
                    $("#popupModal").modal('show');
                }
            })

        }



        function delete_worker(button) {

            const tableROW = button.parentNode.parentNode
            var email = tableROW.getElementsByTagName("span")[2].innerText;
            
            const table = document.getElementsByClassName("user-list")[0]
            const body = table.getElementsByTagName("tbody")[0]

            fetch(
                "../../../php/manage_worker.php",
                {
                    method: 'POST',
                    body: new URLSearchParams({
                        'email': email,
                        'action': 'remove'
                    })
                }
            )
            .then(response => (response.json()))
            .then(response => {
                if(response['success'] != true) {
                    document.getElementById("popupModal").getElementsByClassName("modal-body")[0].innerText = response['error'];
                    document.getElementById("popupModal").getElementsByClassName("modal-footer")[0].innerHTML = `<button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-sharp fa-light fa-circle-xmark"></i></button>`;
                    $("#popupModal").modal('show');
                }
                else {
                    document.getElementById("popupModal").getElementsByClassName("modal-body")[0].innerText = response['message'];
                    document.getElementById("popupModal").getElementsByClassName("modal-footer")[0].innerHTML = `<button type="button" class="btn btn-success" data-bs-dismiss="modal"><i class="fa-sharp fa-light fa-circle-check"></i></button>`;
                    $("#popupModal").modal('show');
                    const table = document.getElementsByClassName("user-list")[0];
                    const body = table.getElementsByTagName("tbody")[0];
                    body.removeChild(document.getElementById(tableROW.getAttribute("id")));
                }
            })

        }



        function add_worker() {
            var name = document.getElementsByName('fullnameinp')[0].value;
            var email = document.getElementsByName('emailinp')[0].value;
            var password = document.getElementsByName('passwrodinp')[0].value;
            var phone = document.getElementsByName('phoneinp')[0].value;

            fetch(
                "../../../php/manage_worker.php",
                {
                    method: 'POST',
                    body: new URLSearchParams({
                        'name': name,
                        'email': email,
                        'password': password,
                        'phone': phone,
                        'action': 'add'
                    })
                }
            )
            .then(response => (response.json()))
            .then(response => {
                $("#addAdmin").modal('hide');
                if(response['success'] != true) {
                    document.getElementById("popupModal").getElementsByClassName("modal-body")[0].innerText = response['error'];
                    document.getElementById("popupModal").getElementsByClassName("modal-footer")[0].innerHTML = `<button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-sharp fa-light fa-circle-xmark"></i></button>`;
                    $("#popupModal").modal('show');
                }
                else {
                    document.getElementById("popupModal").getElementsByClassName("modal-body")[0].innerText = response['message']
                    document.getElementById("popupModal").getElementsByClassName("modal-footer")[0].innerHTML = `<button type="button" class="btn btn-success" data-bs-dismiss="modal"><i class="fa-sharp fa-light fa-circle-check"></i></button>`;
                    $("#popupModal").modal('show');
                    const table = document.getElementsByClassName("user-list")[0]
                    const body = table.getElementsByTagName("tbody")[0]

                    var date = response['created'];
                    var userid = response['id']

                    var html = `<tr id="user-${userid}">
                                    <td>
                                        <img src='https://icons.veryicon.com/png/o/miscellaneous/forestry-in-yiliang/person-fill.png' alt=''>
                                        <a href='#' class='user-link'>${name}</a>
                                        <span class='user-subhead'>Admin</span>
                                    </td>
                                    <td>${date}</td>
                                    <td class='text-center'>
                                        <span class='label label-default'>Active</span>
                                    </td>
                                    <td>
                                        <a href='#'><span class=''>${email}</span></a>
                                    </td>
                                    <td>${phone}</td>
                                    <td style='width: 20%;'>
                                        <button class='btn btn-primary' onclick='edit_modal_fill(this)'>
                                            <i class='fa fa-pencil fa-stack-1x fa-inverse' style='position: relative'></i>
                                        </button>
                                        <button class='btn btn-danger' onclick='delete_worker(this)'>
                                            <i class='fa fa-trash fa-stack-1x fa-inverse' style='position: relative'></i>
                                        </button>
                                    </td>
                                </tr>`
                    body.innerHTML += html;
                }
            })
        }
    </script>


</body>

</html>