<?php include "../../../php/check_login.php"; ?>


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
                            <div class="collapse show" id="orders">
                                <ul class="navbar-nav ps-3">
                                    <li>
                                        <a href="import-export.php" class="nav-link px-3 active">
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

    <section>
        <main class="mt-5 pt-3">
            <h3>Import/Export Producs Page</h3>

            <table class="tb1">
                <tr>
                    <form method="post"> 
                        <th >
                            <label >Type</label>
                            <select name="type" id="typeSelect"> 
                                <option></option>
                                <option value="Import">Import</option>
                                <option value="Export">Export</option>
                            </select>
                        </th>
                        <td >
                            <label >Service</label>
                            <select id="serviceSelect">
                                <option></option>
                                <option value="DTD">Door to Door</option>
                                <option value="QTQ">Quay to Quay</option>
                                <option value="DTD">Quay to Door</option>
                                <option value="QTQ">Door to Quay</option>
                            </select>
                        </td>

                        <td >
                            <label>Rent Cargo</label>
                            <select id="rentCargoValue">
                                <option></option>
                                <option value="N">No</option>
                                <option value="Y">Yes</option>
                            </select>
                        </td>

                        <td class="t1">
                            <form method="post" id="myForm">
                        <th>
                            <form method="post" id="myForm">
                        <td class="t1">
                            <label>Category</label>
                            <select name="category" id="categorySelect" onchange="toggleCustomCategory()">
                                <?php
                                $categories = array(
                                    "",
                                    "Electronics",
                                    "Home & Kitchen",
                                    "Health & Beauty",
                                    "Fashion",
                                    "Automotives",
                                    "Sports & Outdoors",
                                    "Patio & Garden",
                                    "Baby & Toys",
                                    "Solar Energy & Accessories",
                                    "Tools & Home Improvement",
                                    "Clothing",
                                    "Toys",
                                    "Others"
                                );

                                // Loop through the categories array to generate options
                                foreach ($categories as $category) {
                                    echo '<option value="' . $category . '">' . $category . '</option>';
                                }
                                ?>
                            </select>
                        </td>

                        <td>
                            <label>Weight</label>
                            <input type="text" placeholder="IN KG" size="2">
                        </td>
                    </form>

                    <!-- JavaScript to toggle visibility of Custom Category input -->
                    <script>
                        function toggleCustomCategory() {
                            console.log("OK");
                            var categorySelect = document.getElementById("categorySelect");
                            var customCategoryInput = document.querySelector('input[name="custom category"]');
                            var customCategoryLabel = document.querySelector('label[for="Custom Categorie"]');
                            if (categorySelect.value === "Others") {
                                customCategoryInput.style.display = "block";
                                customCategoryLabel.style.display = "block";
                            } else {
                                customCategoryInput.style.display = "none";
                                customCategoryLabel.style.display = "none";
                            }
                        }
                        toggleCustomCategory();
                    </script>
                    </td>


                </tr>

                <tr>
                    <th class="t1" >
                        <label>Destination/From</label>
                        <select name="destination" id="destinationSelect">
                            <?php
                            // Array of countries
                            $countries = array(
                                "Afghanistan",
                                "Aland Islands",
                                "Albania",
                                "Algeria",
                                "American Samoa",
                                "Andorra",
                                "Angola",
                                "Anguilla",
                                "Antarctica",
                                "Antigua and Barbuda",
                                "Argentina",
                                "Armenia",
                                "Aruba",
                                "Australia",
                                "Austria",
                                "Azerbaijan",
                                "Bahamas",
                                "Bahrain",
                                "Bangladesh",
                                "Barbados",
                                "Belarus",
                                "Belgium",
                                "Belize",
                                "Benin",
                                "Bermuda",
                                "Bhutan",
                                "Bolivia",
                                "Bonaire, Sint Eustatius and Saba",
                                "Bosnia and Herzegovina",
                                "Botswana",
                                "Bouvet Island",
                                "Brazil",
                                "British Indian Ocean Territory",
                                "Brunei Darussalam",
                                "Bulgaria",
                                "Burkina Faso",
                                "Burundi",
                                "Cambodia",
                                "Cameroon",
                                "Canada",
                                "Cape Verde",
                                "Cayman Islands",
                                "Central African Republic",
                                "Chad",
                                "Chile",
                                "China",
                                "Christmas Island",
                                "Cocos (Keeling) Islands",
                                "Colombia",
                                "Comoros",
                                "Congo",
                                "Congo, Democratic Republic of the Congo",
                                "Cook Islands",
                                "Costa Rica",
                                "Cote D'Ivoire",
                                "Croatia",
                                "Cuba",
                                "Curacao",
                                "Cyprus",
                                "Czech Republic",
                                "Denmark",
                                "Djibouti",
                                "Dominica",
                                "Dominican Republic",
                                "Ecuador",
                                "Egypt",
                                "El Salvador",
                                "Equatorial Guinea",
                                "Eritrea",
                                "Estonia",
                                "Ethiopia",
                                "Falkland Islands (Malvinas)",
                                "Faroe Islands",
                                "Fiji",
                                "Finland",
                                "France",
                                "French Guiana",
                                "French Polynesia",
                                "French Southern Territories",
                                "Gabon",
                                "Gambia",
                                "Georgia",
                                "Germany",
                                "Ghana",
                                "Gibraltar",
                                "Greece",
                                "Greenland",
                                "Grenada",
                                "Guadeloupe",
                                "Guam",
                                "Guatemala",
                                "Guernsey",
                                "Guinea",
                                "Guinea-Bissau",
                                "Guyana",
                                "Haiti",
                                "Heard Island and McDonald Islands",
                                "Holy See (Vatican City State)",
                                "Honduras",
                                "Hong Kong",
                                "Hungary",
                                "Iceland",
                                "India",
                                "Indonesia",
                                "Iran, Islamic Republic of",
                                "Iraq",
                                "Ireland",
                                "Isle of Man",
                                "Israel",
                                "Italy",
                                "Jamaica",
                                "Japan",
                                "Jersey",
                                "Jordan",
                                "Kazakhstan",
                                "Kenya",
                                "Kiribati",
                                "Korea, Democratic People's Republic of",
                                "Korea, Republic of",
                                "Kosovo",
                                "Kuwait",
                                "Kyrgyzstan",
                                "Lao People's Democratic Republic",
                                "Latvia",
                                "Lebanon",
                                "Lesotho",
                                "Liberia",
                                "Libyan Arab Jamahiriya",
                                "Liechtenstein",
                                "Lithuania",
                                "Luxembourg",
                                "Macao",
                                "Macedonia, the Former Yugoslav Republic of",
                                "Madagascar",
                                "Malawi",
                                "Malaysia",
                                "Maldives",
                                "Mali",
                                "Malta",
                                "Marshall Islands",
                                "Martinique",
                                "Mauritania",
                                "Mauritius",
                                "Mayotte",
                                "Mexico",
                                "Micronesia, Federated States of",
                                "Moldova, Republic of",
                                "Monaco",
                                "Mongolia",
                                "Montenegro",
                                "Montserrat",
                                "Morocco",
                                "Mozambique",
                                "Myanmar",
                                "Namibia",
                                "Nauru",
                                "Nepal",
                                "Netherlands",
                                "Netherlands Antilles",
                                "New Caledonia",
                                "New Zealand",
                                "Nicaragua",
                                "Niger",
                                "Nigeria",
                                "Niue",
                                "Norfolk Island",
                                "Northern Mariana Islands",
                                "Norway",
                                "Oman",
                                "Pakistan",
                                "Palau",
                                "Palestinian Territory, Occupied",
                                "Panama",
                                "Papua New Guinea",
                                "Paraguay",
                                "Peru",
                                "Philippines",
                                "Pitcairn",
                                "Poland",
                                "Portugal",
                                "Puerto Rico",
                                "Qatar",
                                "Reunion",
                                "Romania",
                                "Russian Federation",
                                "Rwanda",
                                "Saint Barthelemy",
                                "Saint Helena",
                                "Saint Kitts and Nevis",
                                "Saint Lucia",
                                "Saint Martin",
                                "Saint Pierre and Miquelon",
                                "Saint Vincent and the Grenadines",
                                "Samoa",
                                "San Marino",
                                "Sao Tome and Principe",
                                "Saudi Arabia",
                                "Senegal",
                                "Serbia",
                                "Serbia and Montenegro",
                                "Seychelles",
                                "Sierra Leone",
                                "Singapore",
                                "St Martin",
                                "Slovakia",
                                "Slovenia",
                                "Solomon Islands",
                                "Somalia",
                                "South Africa",
                                "South Georgia and the South Sandwich Islands",
                                "South Sudan",
                                "Spain",
                                "Sri Lanka",
                                "Sudan",
                                "Suriname",
                                "Svalbard and Jan Mayen",
                                "Swaziland",
                                "Sweden",
                                "Switzerland",
                                "Syrian Arab Republic",
                                "Taiwan, Province of China",
                                "Tajikistan",
                                "Tanzania, United Republic of",
                                "Thailand",
                                "Timor-Leste",
                                "Togo",
                                "Tokelau",
                                "Tonga",
                                "Trinidad and Tobago",
                                "Tunisia",
                                "Turkey",
                                "Turkmenistan",
                                "Turks and Caicos Islands",
                                "Tuvalu",
                                "Uganda",
                                "Ukraine",
                                "United Arab Emirates",
                                "United Kingdom",
                                "United States",
                                "United States Minor Outlying Islands",
                                "Uruguay",
                                "Uzbekistan",
                                "Vanuatu",
                                "Venezuela",
                                "Viet Nam",
                                "Virgin Islands, British",
                                "Virgin Islands, U.s.",
                                "Wallis and Futuna",
                                "Western Sahara",
                                "Yemen",
                                "Zambia",
                                "Zimbabwe"
                            );

                            // Loop through the countries array to generate options
                            foreach ($countries as $country) {
                                echo '<option value="' . $country . '">' . $country . '</option>';
                            }
                            ?>
                        </select>
                    </th>

                    <td class="t1" >
                        <label>Delivery Type</label>
                        <select id="deliverySelect">
                            <option value="Import">DHL</option>
                            <option value="Export">Aramex</option>
                            <option value="Export">Liban post</option>
                        </select>
                    </td>

                    <td class="t1">
                        <label style="display: none;" for="Custom Categorie">Custom Categorie</label>
                        <input type="text" size="10" name="custom category" style="display: none;" id="categorySelect">
                    </td>

                    <td class="t1"></td>
                    <td class="t1">
                        <input type="button" value="Calculate" onclick="displaySelectedValues()"></input>
                    </td>
                </tr>
            </table>

            <div class="row">
                <div class="column">
                    <table class="t3" >
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
    <script>
        function displaySelectedValues() {
    // Get the selected values
    var typeValue = document.getElementById("typeSelect").value;
    var serviceValue = document.getElementById("serviceSelect").value;
    var destinationValue = document.getElementById("destinationSelect").value;
    var deliveryValue = document.getElementById("deliverySelect").value;
    var categoryValue = document.getElementById("categorySelect").value;
    var weightValue = document.getElementById("weightInput").value;

    // Display the values in table 1
    document.getElementById("table1").innerHTML = `
        <tr>
            <th>Weight</th>
            <th>${weightValue}kg</th>
        </tr>
        <tr>
            <td>Type</td>
            <td>${typeValue}</td>
        </tr>
        <tr>
            <td>Destination/from</td>
            <td>${destinationValue}</td>
        </tr>
        <tr>
            <td>Service</td>
            <td>${serviceValue}</td>
        </tr>
        <tr>
            <td>Delivery</td>
            <td>${deliveryValue}</td>
        </tr>
        <tr>
            <td>Renting Cargo</td>
            <td>${document.getElementById("rentCargoSelect").value}</td>
        </tr>
    `;

    // Display the values in table 2
    document.getElementById("table2").innerHTML = `
        <tr>
            <th>Categorie</th>
            <th>${categoryValue}</th>
        </tr>
        <tr>
            <td>Categorie price/KG</td>
            <td>5$</td>
        </tr>
        <tr>
            <td>T.V.A</td>
            <td>11%</td>
        </tr>
        <tr>
            <td>Final Price</td>
            <td>${calculateFinalPrice(weightValue, categoryValue)*11}$</td>
        </tr>
    `;
}

function calculateFinalPrice(weight, category) {
    if (category === "Electronics") {
        return weight * 5;
    } else {
        return weight * 10;
    }
}
    </script>
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