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
    <link rel="stylesheet" href="../../../../static/css/worker/market-list.css">
    <link rel="shortcut icon" href="../../../../static/img/favicon.ico" type="image/x-icon">
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
                            <div class="collapse show" id="marketplace">
                                <ul class="navbar-nav ps-3">
                                    <li>
                                        <a href="marketplace-list.php" class="nav-link px-3 active">
                                            <span class="me-2">
                                                <i class="bi bi-card-list"></i>
                                            </span>
                                            <span>View Market List</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="marketplace-items.php" class="nav-link px-3">
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

    <!-- MarketPlace List Start -->
    <section>
        <main class="mt-5 pt-3">
            <div class="text-center">
                <h2>MarketPlace</h2>
            </div>
            <div class="container market-items">
                <div class="row row-cols-3">

                    <div class="card col">
                        <img src="../../../../static/img/laptop.webp" class="card-img-top" alt="Item Image">
                        <div class="card-body">
                            <h5 class="card-title">Lenovo Ideapad 3950</h5>
                            <p class="card-text"> CPU: i7 12700K, GPU: RTX 4090 TI, RAM: 32GB</p>
                            <p class="card-text">300$</p>
                            <a href="item-page.php" class="btn btn-primary">
                                <i class="fa-solid fa-basket-shopping-minus"></i>
                            </a>
                        </div>
                    </div>

                    <div class="card col">
                        <img src="../../../../static/img/laptop.webp" class="card-img-top" alt="Item Image">
                        <div class="card-body">
                            <h5 class="card-title">Lenovo Ideapad 3950</h5>
                            <p class="card-text"> CPU: i7 12700K, GPU: RTX 4090 TI, RAM: 32GB</p>
                            <p class="card-text">300$</p>
                            <a href="#" class="btn btn-primary">
                                <i class="fa-solid fa-basket-shopping-minus"></i>
                            </a>
                        </div>
                    </div>

                    <div class="card col">
                        <img src="../../../../static/img/laptop.webp" class="card-img-top" alt="Item Image">
                        <div class="card-body">
                            <h5 class="card-title">Lenovo Ideapad 3950</h5>
                            <p class="card-text"> CPU: i7 12700K, GPU: RTX 4090 TI, RAM: 32GB</p>
                            <p class="card-text">300$</p>
                            <a href="#" class="btn btn-primary">
                                <i class="fa-solid fa-basket-shopping-minus"></i>
                            </a>
                        </div>
                    </div>

                    <div class="card col">
                        <img src="../../../../static/img/laptop.webp" class="card-img-top" alt="Item Image">
                        <div class="card-body">
                            <h5 class="card-title">Lenovo Ideapad 3950</h5>
                            <p class="card-text"> CPU: i7 12700K, GPU: RTX 4090 TI, RAM: 32GB</p>
                            <p class="card-text">300$</p>
                            <a href="#" class="btn btn-primary">
                                <i class="fa-solid fa-basket-shopping-minus"></i>
                            </a>
                        </div>
                    </div>

                    <div class="card col">
                        <img src="../../../../static/img/laptop.webp" class="card-img-top" alt="Item Image">
                        <div class="card-body">
                            <h5 class="card-title">Lenovo Ideapad 3950</h5>
                            <p class="card-text"> CPU: i7 12700K, GPU: RTX 4090 TI, RAM: 32GB</p>
                            <p class="card-text">300$</p>
                            <a href="#" class="btn btn-primary">
                                <i class="fa-solid fa-basket-shopping-minus"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </main>

    </section>
    <!-- MarketPlace List End -->


    <!-- Start Modals -->

    <!-- Edit Modal Start-->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <span>Name:</span>
                        </div>
                        <div class="col-md-6">
                            <span>Price:</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" value="Lebanon Ideapad 3950">
                        </div>
                        <div class="col-md-6">
                            <input type="text" value="300">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <span>Description:</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <textarea name="description" id="description" rows="6" style="width: 100%; resize:none;"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveEditButton">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal End-->

    <!-- Delete Modal Start -->

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to <span style="font-size: larger; font-weight: 900;">REMOVE</span>: <span>Lenovo Ideapad 3950</span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteButton">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal End -->

    <!-- Add Item Modal Start -->

    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <span>Name:</span>
                        </div>
                        <div class="col-md-6">
                            <span>Price:</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" value="Lenovo Ideapad 3950" id="itemName">
                        </div>
                        <div class="col-md-6">
                            <input type="text" value="300" id="itemPrice">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <span>Pictures:</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="file" id="itemPicture">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <span>itemDescription:</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <textarea name="itemDescription" id="itemDescription" rows="6" style="width: 100%; resize: none;"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="addItemButton">Add</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Item Modal End -->

    <!-- End Modals -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js" integrity="sha512-pax4MlgXjHEPfCwcJLQhigY7+N8rt6bVvWLFyUMuxShv170X53TRzGPmPkZmGBhk+jikR8WBM4yl7A9WMHHqvg==" crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script src="../../../../static/js/admin/script.js"></script>
    <script>
        document.getElementById('addItemButton').addEventListener('click', async function() {
            const name = document.getElementById('itemName').value;
            const price = document.getElementById('itemPrice').value;
            const picture = document.getElementById('itemPicture').files[0];
            const description = document.getElementById('itemDescription').value;

            try {
                const response = await fetch('../../../php/add_item.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams({
                        name: name,
                        price: price,
                        picture: picture,
                        description: description
                    })
                });

                const result = await response.json();
                if (response.ok) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert('Failed to add item: ' + result.message);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred while adding the item');
            }
        });
    </script>
    <script>
        document.getElementById('confirmDeleteButton').addEventListener('click', async function() {
            const itemId = this.getAttribute('data-item-id');

            try {
                const response = await fetch('../../../php/delete_item.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams({
                        itemid: itemid
                    })
                });

                const result = await response.json();
                if (response.ok) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert('Failed to delete item: ' + result.message);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred while deleting the item');
            }
        });
    </script>
    <script>
        // function showEditModal(itemId, itemName, itemPrice, itemDescription) {
        //     document.getElementById('editItemId').value = itemId;
        //     document.getElementById('editItemName').value = itemName;
        //     document.getElementById('editItemPrice').value = itemPrice;
        //     document.getElementById('editItemDescription').value = itemDescription;
        //     const editModal = new bootstrap.Modal(document.getElementById('editModal'));
        //     editModal.show();
        // }

        document.getElementById('saveEditButton').addEventListener('click', async function() {
            // const itemId = document.getElementById('editItemId').value;
            const itemId = this.getAttribute('data-item-id');
            const name = document.getElementById('editItemName').value;
            const price = document.getElementById('editItemPrice').value;
            const description = document.getElementById('editItemDescription').value;

            try {
                const response = await fetch('edit_item.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams({
                        id: itemId,
                        name: name,
                        price: price,
                        description: description,
                    })
                });

                const result = await response.json();
                if (response.ok) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert('Failed to update item: ' + result.message);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred while updating the item');
            }
        });
    </script>
    
</body>

</html>