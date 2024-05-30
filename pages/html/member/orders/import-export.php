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
                        <th>
                            <label>Type</label>
                            <select name="type" id="typeSelect">
                                <option></option>
                                <option value="Import">Import</option>
                                <option value="Export">Export</option>
                            </select>
                        </th>
                        <td>
                            <label>Service</label>
                            <select id="serviceSelect">
                                <option></option>
                                <option value="DTD">Door to Door</option>
                                <option value="QTQ">Quay to Quay</option>
                                <option value="QTD">Quay to Door</option>
                                <option value="DTQ">Door to Quay</option>
                            </select>
                        </td>

                        <td>
                            <label>Rent Cargo</label>
                            <select id="rentCargoValue">
                                <option></option>
                                <option value="NO">No</option>
                                <option value="YES">Yes</option>
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
                            <input type="text" placeholder="IN KG" size="2" id="weightInput">
                        </td>
                    </form>

                    <script>
                        function toggleCustomCategory() {
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
                    <th class="t1">
                        <label>Destination/From</label>
                        <select name="destination" id="destinationSelect">
                            <option value='Afghanistan'>Afghanistan</option>
                            <option value='Aland Islands'>Aland Islands</option>
                            <option value='Albania'>Albania</option>
                            <option value='Algeria'>Algeria</option>
                            <option value='American Samoa'>American Samoa</option>
                            <option value='Andorra'>Andorra</option>
                            <option value='Angola'>Angola</option>
                            <option value='Anguilla'>Anguilla</option>
                            <option value='Antarctica'>Antarctica</option>
                            <option value='Antigua and Barbuda'>Antigua and Barbuda</option>
                            <option value='Argentina'>Argentina</option>
                            <option value='Armenia'>Armenia</option>
                            <option value='Aruba'>Aruba</option>
                            <option value='Australia'>Australia</option>
                            <option value='Austria'>Austria</option>
                            <option value='Azerbaijan'>Azerbaijan</option>
                            <option value='Bahamas'>Bahamas</option>
                            <option value='Bahrain'>Bahrain</option>
                            <option value='Bangladesh'>Bangladesh</option>
                            <option value='Barbados'>Barbados</option>
                            <option value='Belarus'>Belarus</option>
                            <option value='Belgium'>Belgium</option>
                            <option value='Belize'>Belize</option>
                            <option value='Benin'>Benin</option>
                            <option value='Bermuda'>Bermuda</option>
                            <option value='Bhutan'>Bhutan</option>
                            <option value='Bolivia'>Bolivia</option>
                            <option value='Bonaire, Sint Eustatius and Saba'>Bonaire, Sint Eustatius and Saba</option>
                            <option value='Bosnia and Herzegovina'>Bosnia and Herzegovina</option>
                            <option value='Botswana'>Botswana</option>
                            <option value='Bouvet Island'>Bouvet Island</option>
                            <option value='Brazil'>Brazil</option>
                            <option value='British Indian Ocean Territory'>British Indian Ocean Territory</option>
                            <option value='Brunei Darussalam'>Brunei Darussalam</option>
                            <option value='Bulgaria'>Bulgaria</option>
                            <option value='Burkina Faso'>Burkina Faso</option>
                            <option value='Burundi'>Burundi</option>
                            <option value='Cambodia'>Cambodia</option>
                            <option value='Cameroon'>Cameroon</option>
                            <option value='Canada'>Canada</option>
                            <option value='Cape Verde'>Cape Verde</option>
                            <option value='Cayman Islands'>Cayman Islands</option>
                            <option value='Central African Republic'>Central African Republic</option>
                            <option value='Chad'>Chad</option>
                            <option value='Chile'>Chile</option>
                            <option value='China'>China</option>
                            <option value='Christmas Island'>Christmas Island</option>
                            <option value='Cocos (Keeling) Islands'>Cocos (Keeling) Islands</option>
                            <option value='Colombia'>Colombia</option>
                            <option value='Comoros'>Comoros</option>
                            <option value='Congo'>Congo</option>
                            <option value='Congo, Democratic Republic of the Congo'>Congo, Democratic Republic of the
                                Congo</option>
                            <option value='Cook Islands'>Cook Islands</option>
                            <option value='Costa Rica'>Costa Rica</option>
                            <option value='Cote D' Ivoire'>Cote D'Ivoire</option>
                            <option value='Croatia'>Croatia</option>
                            <option value='Cuba'>Cuba</option>
                            <option value='Curacao'>Curacao</option>
                            <option value='Cyprus'>Cyprus</option>
                            <option value='Czech Republic'>Czech Republic</option>
                            <option value='Denmark'>Denmark</option>
                            <option value='Djibouti'>Djibouti</option>
                            <option value='Dominica'>Dominica</option>
                            <option value='Dominican Republic'>Dominican Republic</option>
                            <option value='Ecuador'>Ecuador</option>
                            <option value='Egypt'>Egypt</option>
                            <option value='El Salvador'>El Salvador</option>
                            <option value='Equatorial Guinea'>Equatorial Guinea</option>
                            <option value='Eritrea'>Eritrea</option>
                            <option value='Estonia'>Estonia</option>
                            <option value='Ethiopia'>Ethiopia</option>
                            <option value='Falkland Islands (Malvinas)'>Falkland Islands (Malvinas)</option>
                            <option value='Faroe Islands'>Faroe Islands</option>
                            <option value='Fiji'>Fiji</option>
                            <option value='Finland'>Finland</option>
                            <option value='France'>France</option>
                            <option value='French Guiana'>French Guiana</option>
                            <option value='French Polynesia'>French Polynesia</option>
                            <option value='French Southern Territories'>French Southern Territories</option>
                            <option value='Gabon'>Gabon</option>
                            <option value='Gambia'>Gambia</option>
                            <option value='Georgia'>Georgia</option>
                            <option value='Germany'>Germany</option>
                            <option value='Ghana'>Ghana</option>
                            <option value='Gibraltar'>Gibraltar</option>
                            <option value='Greece'>Greece</option>
                            <option value='Greenland'>Greenland</option>
                            <option value='Grenada'>Grenada</option>
                            <option value='Guadeloupe'>Guadeloupe</option>
                            <option value='Guam'>Guam</option>
                            <option value='Guatemala'>Guatemala</option>
                            <option value='Guernsey'>Guernsey</option>
                            <option value='Guinea'>Guinea</option>
                            <option value='Guinea-Bissau'>Guinea-Bissau</option>
                            <option value='Guyana'>Guyana</option>
                            <option value='Haiti'>Haiti</option>
                            <option value='Heard Island and McDonald Islands'>Heard Island and McDonald Islands</option>
                            <option value='Holy See (Vatican City State)'>Holy See (Vatican City State)</option>
                            <option value='Honduras'>Honduras</option>
                            <option value='Hong Kong'>Hong Kong</option>
                            <option value='Hungary'>Hungary</option>
                            <option value='Iceland'>Iceland</option>
                            <option value='India'>India</option>
                            <option value='Indonesia'>Indonesia</option>
                            <option value='Iran, Islamic Republic of'>Iran, Islamic Republic of</option>
                            <option value='Iraq'>Iraq</option>
                            <option value='Ireland'>Ireland</option>
                            <option value='Isle of Man'>Isle of Man</option>
                            <option value='Israel'>Israel</option>
                            <option value='Italy'>Italy</option>
                            <option value='Jamaica'>Jamaica</option>
                            <option value='Japan'>Japan</option>
                            <option value='Jersey'>Jersey</option>
                            <option value='Jordan'>Jordan</option>
                            <option value='Kazakhstan'>Kazakhstan</option>
                            <option value='Kenya'>Kenya</option>
                            <option value='Kiribati'>Kiribati</option>
                            <option value='Korea, Democratic People' s Republic of'>Korea, Democratic People's Republic
                                of</option>
                            <option value='Korea, Republic of'>Korea, Republic of</option>
                            <option value='Kosovo'>Kosovo</option>
                            <option value='Kuwait'>Kuwait</option>
                            <option value='Kyrgyzstan'>Kyrgyzstan</option>
                            <option value='Lao People' s Democratic Republic'>Lao People's Democratic Republic</option>
                            <option value='Latvia'>Latvia</option>
                            <option value='Lebanon'>Lebanon</option>
                            <option value='Lesotho'>Lesotho</option>
                            <option value='Liberia'>Liberia</option>
                            <option value='Libyan Arab Jamahiriya'>Libyan Arab Jamahiriya</option>
                            <option value='Liechtenstein'>Liechtenstein</option>
                            <option value='Lithuania'>Lithuania</option>
                            <option value='Luxembourg'>Luxembourg</option>
                            <option value='Macao'>Macao</option>
                            <option value='Macedonia, the Former Yugoslav Republic of'>Macedonia, the Former Yugoslav
                                Republic of</option>
                            <option value='Madagascar'>Madagascar</option>
                            <option value='Malawi'>Malawi</option>
                            <option value='Malaysia'>Malaysia</option>
                            <option value='Maldives'>Maldives</option>
                            <option value='Mali'>Mali</option>
                            <option value='Malta'>Malta</option>
                            <option value='Marshall Islands'>Marshall Islands</option>
                            <option value='Martinique'>Martinique</option>
                            <option value='Mauritania'>Mauritania</option>
                            <option value='Mauritius'>Mauritius</option>
                            <option value='Mayotte'>Mayotte</option>
                            <option value='Mexico'>Mexico</option>
                            <option value='Micronesia, Federated States of'>Micronesia, Federated States of</option>
                            <option value='Moldova, Republic of'>Moldova, Republic of</option>
                            <option value='Monaco'>Monaco</option>
                            <option value='Mongolia'>Mongolia</option>
                            <option value='Montenegro'>Montenegro</option>
                            <option value='Montserrat'>Montserrat</option>
                            <option value='Morocco'>Morocco</option>
                            <option value='Mozambique'>Mozambique</option>
                            <option value='Myanmar'>Myanmar</option>
                            <option value='Namibia'>Namibia</option>
                            <option value='Nauru'>Nauru</option>
                            <option value='Nepal'>Nepal</option>
                            <option value='Netherlands'>Netherlands</option>
                            <option value='Netherlands Antilles'>Netherlands Antilles</option>
                            <option value='New Caledonia'>New Caledonia</option>
                            <option value='New Zealand'>New Zealand</option>
                            <option value='Nicaragua'>Nicaragua</option>
                            <option value='Niger'>Niger</option>
                            <option value='Nigeria'>Nigeria</option>
                            <option value='Niue'>Niue</option>
                            <option value='Norfolk Island'>Norfolk Island</option>
                            <option value='Northern Mariana Islands'>Northern Mariana Islands</option>
                            <option value='Norway'>Norway</option>
                            <option value='Oman'>Oman</option>
                            <option value='Pakistan'>Pakistan</option>
                            <option value='Palau'>Palau</option>
                            <option value='Palestinian Territory, Occupied'>Palestinian Territory, Occupied</option>
                            <option value='Panama'>Panama</option>
                            <option value='Papua New Guinea'>Papua New Guinea</option>
                            <option value='Paraguay'>Paraguay</option>
                            <option value='Peru'>Peru</option>
                            <option value='Philippines'>Philippines</option>
                            <option value='Pitcairn'>Pitcairn</option>
                            <option value='Poland'>Poland</option>
                            <option value='Portugal'>Portugal</option>
                            <option value='Puerto Rico'>Puerto Rico</option>
                            <option value='Qatar'>Qatar</option>
                            <option value='Reunion'>Reunion</option>
                            <option value='Romania'>Romania</option>
                            <option value='Russian Federation'>Russian Federation</option>
                            <option value='Rwanda'>Rwanda</option>
                            <option value='Saint Barthelemy'>Saint Barthelemy</option>
                            <option value='Saint Helena'>Saint Helena</option>
                            <option value='Saint Kitts and Nevis'>Saint Kitts and Nevis</option>
                            <option value='Saint Lucia'>Saint Lucia</option>
                            <option value='Saint Martin'>Saint Martin</option>
                            <option value='Saint Pierre and Miquelon'>Saint Pierre and Miquelon</option>
                            <option value='Saint Vincent and the Grenadines'>Saint Vincent and the Grenadines</option>
                            <option value='Samoa'>Samoa</option>
                            <option value='San Marino'>San Marino</option>
                            <option value='Sao Tome and Principe'>Sao Tome and Principe</option>
                            <option value='Saudi Arabia'>Saudi Arabia</option>
                            <option value='Senegal'>Senegal</option>
                            <option value='Serbia'>Serbia</option>
                            <option value='Serbia and Montenegro'>Serbia and Montenegro</option>
                            <option value='Seychelles'>Seychelles</option>
                            <option value='Sierra Leone'>Sierra Leone</option>
                            <option value='Singapore'>Singapore</option>
                            <option value='St Martin'>St Martin</option>
                            <option value='Slovakia'>Slovakia</option>
                            <option value='Slovenia'>Slovenia</option>
                            <option value='Solomon Islands'>Solomon Islands</option>
                            <option value='Somalia'>Somalia</option>
                            <option value='South Africa'>South Africa</option>
                            <option value='South Georgia and the South Sandwich Islands'>South Georgia and the South
                                Sandwich Islands</option>
                            <option value='South Sudan'>South Sudan</option>
                            <option value='Spain'>Spain</option>
                            <option value='Sri Lanka'>Sri Lanka</option>
                            <option value='Sudan'>Sudan</option>
                            <option value='Suriname'>Suriname</option>
                            <option value='Svalbard and Jan Mayen'>Svalbard and Jan Mayen</option>
                            <option value='Swaziland'>Swaziland</option>
                            <option value='Sweden'>Sweden</option>
                            <option value='Switzerland'>Switzerland</option>
                            <option value='Syrian Arab Republic'>Syrian Arab Republic</option>
                            <option value='Taiwan, Province of China'>Taiwan, Province of China</option>
                            <option value='Tajikistan'>Tajikistan</option>
                            <option value='Tanzania, United Republic of'>Tanzania, United Republic of</option>
                            <option value='Thailand'>Thailand</option>
                            <option value='Timor-Leste'>Timor-Leste</option>
                            <option value='Togo'>Togo</option>
                            <option value='Tokelau'>Tokelau</option>
                            <option value='Tonga'>Tonga</option>
                            <option value='Trinidad and Tobago'>Trinidad and Tobago</option>
                            <option value='Tunisia'>Tunisia</option>
                            <option value='Turkey'>Turkey</option>
                            <option value='Turkmenistan'>Turkmenistan</option>
                            <option value='Turks and Caicos Islands'>Turks and Caicos Islands</option>
                            <option value='Tuvalu'>Tuvalu</option>
                            <option value='Uganda'>Uganda</option>
                            <option value='Ukraine'>Ukraine</option>
                            <option value='United Arab Emirates'>United Arab Emirates</option>
                            <option value='United Kingdom'>United Kingdom</option>
                            <option value='United States'>United States</option>
                            <option value='United States Minor Outlying Islands'>United States Minor Outlying Islands
                            </option>
                            <option value='Uruguay'>Uruguay</option>
                            <option value='Uzbekistan'>Uzbekistan</option>
                            <option value='Vanuatu'>Vanuatu</option>
                            <option value='Venezuela'>Venezuela</option>
                            <option value='Viet Nam'>Viet Nam</option>
                            <option value='Virgin Islands, British'>Virgin Islands, British</option>
                            <option value='Virgin Islands, U.s.'>Virgin Islands, U.s.</option>
                            <option value='Wallis and Futuna'>Wallis and Futuna</option>
                            <option value='Western Sahara'>Western Sahara</option>
                            <option value='Yemen'>Yemen</option>
                            <option value='Zambia'>Zambia</option>
                            <option value='Zimbabwe'>Zimbabwe</option>

                        </select>
                    </th>

                    <td class="t1">
                        <label>Delivery Type</label>
                        <select id="deliverySelect">
                            <option value="DHL">DHL</option>
                            <option value="Aramex">Aramex</option>
                            <option value="Liban Post">Liban Post</option>
                        </select>
                    </td>

                    <td class="t1">
                        <label style="display: none;" for="Custom Categorie">Custom Categorie</label>
                        <input type="text" size="10" name="custom category" style="display: none;" id="customInput">
                    </td>

                    <td class="t1"></td>
                    <td class="t1">
                        <input type="button" value="Calculate" onclick="displaySelectedValues()"></input>
                    </td>
                </tr>
            </table>

            <div class="row">
                <div class="column">
                    <table class="t3" id="table1">
                        <tr>
                            <th>Weight</th>
                            <th id="weightValue"></th>
                        </tr>
                        <tr>
                            <td>Type</td>
                            <td id="typeValue"></td>
                        </tr>
                        <tr>
                            <td>Destination/from</td>
                            <td id="destinationValue"></td>
                        </tr>
                        <tr>
                            <td>Service</td>
                            <td id="serviceValue"></td>
                        </tr>
                        <tr>
                            <td>Delivery</td>
                            <td id="deliveryValue"></td>
                        </tr>
                        <tr>
                            <td>Renting Cargo</td>
                            <td id="rentCargoValue"></td>
                        </tr>
                        <tr>
                            <td>Custom Categorie</td>
                            <td id="customcategorieValue"></td>
                        </tr>
                    </table>
                </div>
                <div class="column">
                    <table class="t3" id="table2">
                        <tr>
                            <th>Categorie</th>
                            <th id="categoryValue"></th>
                        </tr>
                        <tr>
                            <td>Categorie price/KG</td>
                            <td id="categoryPrice"></td>
                        </tr>
                        <tr>
                            <td>T.V.A</td>
                            <td>11%</td>
                        </tr>
                        <tr>
                            <td>Final Price</td>
                            <td id="finalPrice"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="b1">
                <input type="button" value="Confirm" id="confirmButton">
                <input type="button" value="Reset" id="resetButton">
            </div>

        </main>
    </section>
    <script>
        function displaySelectedValues() {
            var typeSelect = document.getElementById("typeSelect");
            var typeValue = typeSelect.options[typeSelect.selectedIndex].value;

            var serviceSelect = document.getElementById("serviceSelect");
            var serviceValue = serviceSelect.options[serviceSelect.selectedIndex].value;

            var destinationSelect = document.getElementById("destinationSelect");
            var destinationValue = destinationSelect.options[destinationSelect.selectedIndex].value;

            var deliverySelect = document.getElementById("deliverySelect");
            var deliveryValue = deliverySelect.options[deliverySelect.selectedIndex].value;

            var categorySelect = document.getElementById("categorySelect");
            var categoryValue = categorySelect.options[categorySelect.selectedIndex].value;

            var rentCargoSelect = document.getElementById("rentCargoValue");
            var rentCargoValue = rentCargoSelect.options[rentCargoSelect.selectedIndex].value;

            var weightValue = document.getElementById("weightInput").value;

            var customcategorieValue = document.getElementById("customInput").value;

            // Display the values in table 1
            const table1 = document.getElementById("table1");
            table1.querySelector("#weightValue").innerText = weightValue;
            table1.querySelector("#typeValue").innerText = typeValue;
            table1.querySelector("#destinationValue").innerText = destinationValue;
            table1.querySelector("#serviceValue").innerText = serviceValue;
            table1.querySelector("#deliveryValue").innerText = deliveryValue;
            table1.querySelector("#rentCargoValue").innerText = rentCargoValue;
            table1.querySelector("#customcategorieValue").innerText = customcategorieValue;

            const table2 = document.getElementById("table2");
            table2.querySelector("#categoryValue").innerText = categoryValue;

            var FinalPrice = calculateFinalPrice(weightValue, categoryValue);

            table2.querySelector("#categoryPrice").innerText = FinalPrice['price'] + "$";
            table2.querySelector("#finalPrice").innerText = calculateFinalPriceWithVAT(FinalPrice['weight'], 11);
        }

        function calculateFinalPrice(weight, category) {
            if (category === "Electronics") {
                return { "weight": weight * 5, "price": 5 }
            } else if (category === "Home & Kitchen") {
                return { "weight": weight * 4, "price": 4 }
            } else if (category === "Health & Beauty") {
                return { "weight": weight * 8, "price": 8 }
            } else if (category === "Fashion") {
                return { "weight": weight * 11, "price": 11 }
            } else if (category === "Automotives") {
                return { "weight": weight * 15, "price": 15 }
            } else if (category === "Sports & Outdoors") {
                return { "weight": weight * 10, "price": 10 }
            } else if (category === "Patio & Garden") {
                return { "weight": weight * 20, "price": 20 }
            } else if (category === "Baby & Toys") {
                return { "weight": weight * 23, "price": 23 }
            } else if (category === "Solar Energy & Accessories") {
                return { "weight": weight * 100, "price": 100 }
            } else if (category === "Tools & Home Improvement") {
                return { "weight": weight * 45, "price": 45 }
            } else if (category === "Clothing") {
                return { "weight": weight * 90, "price": 90 }
            } else if (category === "Toys") {
                return { "weight": weight * 34, "price": 34 }
            } else if (category === "Others") {
                return { "weight": weight * 67, "price": 67 }
            }
        }


        function calculateFinalPriceWithVAT(finalPrice, vatPercentage) {
            const vatAmount = finalPrice * vatPercentage / 100;
            return finalPrice + vatAmount;
        }

        const resetButton = document.getElementById("resetButton");

        resetButton.addEventListener("click", () => {
            document.getElementById("table1");
            table1.querySelector("#weightValue").innerText = "";
            table1.querySelector("#typeValue").innerText = "";
            table1.querySelector("#destinationValue").innerText = "";
            table1.querySelector("#serviceValue").innerText = "";
            table1.querySelector("#deliveryValue").innerText = "";
            table1.querySelector("#rentCargoValue").innerText = "";
            table1.querySelector("#customcategorieValue").innerText = "";

            const table2 = document.getElementById("table2");
            table2.querySelector("#categoryValue").innerText = "";
            table2.querySelector("#categoryPrice").innerText = "";
            table2.querySelector("#finalPrice").innerText = "";
        });


        const confirmButton = document.getElementById("confirmButton");

        document.getElementById("confirmButton").addEventListener("click", function () {
            var weightValue = table1.querySelector("#weightValue").innerText;
            var typeValue = table1.querySelector("#typeValue").innerText;
            var destinationValue = table1.querySelector("#destinationValue").innerText;
            var serviceValue = table1.querySelector("#serviceValue").innerText;
            var deliveryValue = table1.querySelector("#deliveryValue").innerText;
            var rentCargoValue = table1.querySelector("#rentCargoValue").innerText;
            var customcategorieValue = table1.querySelector("#customcategorieValue").innerText;
            
            var categoryValueElement = table2.querySelector("#categoryValue");
            var finalprice = table2.querySelector("#finalPrice").innerText;
            var categoryValue = categoryValueElement ? categoryValueElement.innerText : '';

            const formData = new FormData();
            formData.append('weightValue', weightValue);
            formData.append('typeValue', typeValue);
            formData.append('destinationValue', destinationValue);
            formData.append('serviceValue', serviceValue);
            formData.append('deliveryValue', deliveryValue);
            formData.append('rentCargoValue', rentCargoValue);
            formData.append('customcategorieValue', customcategorieValue);
            formData.append('categoryValue', categoryValue);
            formData.append('finalPrice', finalprice)
            

            fetch(
                "../../../php/add_to_orders.php",
                {
                    method: 'POST',
                    body: formData
                }
            )
            
        });


    </script>
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