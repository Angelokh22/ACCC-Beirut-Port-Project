<?php  include "../../../php/check_login.php"; ?>


<!DOCTYPE html>
<html lang="en">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css"
        integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css" />
    <link rel="stylesheet" href="../../../../static/css/admin/panel.css">
    <link rel="stylesheet" href="../../../../static/css/member/import-export.css">
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

                <a class="navbar-brand theme-text" href="../../../../../index.php">
                    <img src="../../../../../static/img/logo-only.png" alt="ACCC LOGO" id="brand-logo">
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
                                        <a href="import-export.html" class="nav-link px-3 active">
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
                                        <a href="../marketplace/marketplace-list.html" class="nav-link px-3">
                                            <span class="me-2">
                                                <i class="bi bi-card-list"></i>
                                            </span>
                                            <span>View Market List</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../marketplace/marketplace-items.html" class="nav-link px-3">
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
                            <a href="../tracking/tracking.html" class="nav-link px-3">
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

    <section>
        <main class="mt-5 pt-3">
            <h3>Import/Export Producs Page</h3>
                
                    <table class="tb1">
                        <tr>
                            <th>
                                <label>Type</label>
                                <select>
                                    <option></option>
                                    <option value="Import">Import</option>
                                    <option value="Export">Export</option>
                                </select>
                            </th>

                            <td>
                                <label>Service</label>
                                <select>
                                    <option></option>
                                    <option value="DTD">Door to Door</option>
                                    <option value="QTQ">Quay to Quay</option>
                                    <option value="DTD">Quay to Door</option>
                                    <option value="QTQ">Door to Quay</option>
                                </select>
                            </td>

                            <td>
                                <label>Rent Cargo</label>
                                <select>
                                    <option></option>
                                    <option value="N">No</option>
                                    <option value="Y">Yes</option>
                                </select>
                            </td>

                            <td>
                                <label>Category</label>
                                <select>
                                    <option></option>
                                    <option>Electonics</option>
                                    <option>cars</option>
                                    <option></option>
                                </select>
                            </td>

                            <td>
                                <label>Weight</label>
                                <input type="texte" placeholder="IN KG" size="2">
                            </td>
                        </tr>

                        <tr>
                            <th class="t1">
                                <label>Destination/From</label>
                                <select>
                                    <option value="Import">Import</option>
                                    <option value="Export">Export</option>
                                </select>
                            </th>

                            <td class="t1">
                                <label>Delivery Type</label>
                                <select>
                                    <option value="Import"></option>
                                    <option value="Export"></option>
                                </select>
                            </td>

                            <td class="t1">
                                <label>Custom Categorie</label>
                                <input type="text" size="10">
                            </td>

                            <td class="t1"></td>
                            <td class="t1">
                                <input type="button" value="Calculate"></input>
                            </td>
                        </tr>
                    </table>

            <div class="row">
                <div class="column">
                    <table class="t3">
                        <tr>
                            <th>Weight</th>
                            <th>1000kg</th>
                        </tr>
                        <tr>
                            <td>Type</td>
                            <td>Import</td>
                        </tr>
                        <tr>
                            <td>Destination/from</td>
                            <td>U.S.A</td>
                        </tr>
                        <tr>
                            <td>Service</td>
                            <td>Quay Tpo Quay</td>
                        </tr>
                        <tr>
                            <td>Delivery</td>
                            <td>DHL</td>
                        </tr>
                        <tr>
                            <td>Renting Cargo</td>
                            <td>No</td>
                        </tr>
                    </table>
                </div>
                <div class="column">
                    <table class="t3">
                        <tr>
                            <th>Categorie</th>
                            <th>Electronics</th>
                        </tr>
                        <tr>
                            <td>Categorie price/KG</td>
                            <td>5$</td>
                        </tr>
                        <tr>
                            <td>T.V.A</td>
                            <td>10%</td>
                        </tr>
                        <tr>
                            <td>Final Price</td>
                            <td>5500$</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="b1">
                <input type="button" value="Confirm">
                <input type="button" value="Reset">
            </div>

        </main>
    </section>
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