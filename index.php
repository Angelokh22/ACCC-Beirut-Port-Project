<?php 
    include ("./pages/php/tools.php");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./static/css/index.css">
    <link rel="stylesheet" href="./static/css/main-colors.css">
    <link rel="shortcut icon" href="./static/img/favicon.ico" type="image/x-icon">
    <title>ACCC Beirut Port Project</title>
</head>

<body>
    <section id="header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <img src="./static/img/logo-only.png" alt="" style="width: 7ex;">
                    <a class="navbar-brand theme-text" href="#">
                        ACCC beirut Port</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link act" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#services">Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#routes-ports">Routes & Ports</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./pages/html/en/aboutus.html">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./pages/html/en/contactus.html">Contact Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./index_ar.html">AR</a>
                            </li>
                            <li class="nav-item">
                                <!-- <a class="nav-link" href="./pages/html/en/login.php">Sign IN
                                    <i class="fa-solid fa-sign-in"></i>
                                </a> -->
                                <?php 
                                    session_start();

                                    $jwt = $_SESSION['Authorisation'];

                                    if($jwt) {
                                        $result = send_query("SELECT userID FROM Sessions WHERE sessionToken = '$jwt'", true, false);
                                        if($result) {
                                            $userid = $result['userID'];
                                            $result = send_query("SELECT userRole FROM Users WHERE userID = '$userid'", true, false);
                                            if($result) {
                                                $userrole = $result["userRole"];
                                                $result = send_query("SELECT roleName FROM Roles WHERE roleID = '$userrole'", true, false);
                                                $page = $result["roleName"];
                                                echo "<a class='nav-link' href='./pages/html/$page/dashboard.php'>Dashboard</a>";
                                            }
                                            else {
                                                echo '<a class="nav-link" href="./pages/html/en/login.php">Sign IN
                                                <i class="fa-solid fa-sign-in"></i>
                                            </a>';
                                            }
                                        }
                                        else {
                                            echo '<a class="nav-link" href="./pages/html/en/login.php">Sign IN
                                            <i class="fa-solid fa-sign-in"></i>
                                        </a>';
                                        }
                                    }
                                    else {
                                        echo '<a class="nav-link" href="./pages/html/en/login.php">Sign IN
                                        <i class="fa-solid fa-sign-in"></i>
                                    </a>';
                                    }
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- navbar code -->
            <div class="middle">
                <h1 class="text-white display-3 fw-bold">We Help you to <span class="theme-text">import/export</span>
                    your desired shipments.</h1>
            </div>
        </div>
    </section>


    <section class="counter">
        <div class="counter-container">
            <div class="counter-item">
                <h2 class="num" data-val="15"></h2>
                <p>Ships Today</p>
            </div>
            <div class="counter-item">
                <h2 class="num" data-val="1223"></h2>
                <p>Ships Served</p>
            </div>
            <div class="counter-item">
                <h2 class="num" data-val="5654"></h2>
                <p>Trusted Members</p>
            </div>
            <div class="counter-item">
                <h2 class="num" data-val="10054"></h2>
                <p>Total Income</p>
            </div>
        </div>
    </section>


    <div class="explanation">
        <center>
            <section id="services" class="section-title">
                <div class="title">
                    <p>Services</p>
                </div>
            </section>
        </center>

        <section class="services-section">
            <div class="card w-card">
                <img src="./static/img/Port-of-Beirut.jpg" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title">Cargo</h5>
                    <p class="card-text">Discover efficient maritime pathways and timetables in our Routes
                        & Schedules section. Seamlessly plan your voyage with precision.</p>
                    <!-- <a href="#" class="card-link">Learn More <i class="fa-solid fa-arrow-right"></i></a> -->
                </div>
            </div>

            <div class="card w-card">
                <img src="./static/img/1622810090Door-to-door-delivery.png" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title">Door to Door</h5>
                    <p class="card-text">Explore our Door to Door category for seamless cargo transit from
                        port terminals to final destinations. Simplify your logistics journey effortlessly.</p>
                    <!-- <a href="#" class="card-link">Learn More <i class="fa-solid fa-arrow-right"></i></a> -->
                </div>
            </div>

            <div class="card w-card">
                <img src="./static/img/4ae6b35e-785e-4fe2-bcc3-eceb517308bc_1.webp" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title">Quay to Quay</h5>
                    <p class="card-text">Streamline your cargo journey from quay to quay with our dedicated
                        Quay to Quay category. Find efficient solutions for port-to-port logistics seamlessly.</p>
                    <!-- <a href="#" class="card-link">Learn More <i class="fa-solid fa-arrow-right"></i></a> -->
                </div>
            </div>

            <div class="card w-card">
                <img src="./static/img/gps-tracking-icon-logo-illustration-tracking-symbol-template-for-graphic-and-web-design-collection-free-vector_1.jpg"
                    class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title">Tracking</h5>
                    <p class="card-text">Stay informed every step of the way with our Tracking category.
                        Easily monitor your cargo's journey from origin to destination, ensuring transparency and peace
                        of mind.</p>
                    <!-- <a href="#" class="card-link">Learn More <i class="fa-solid fa-arrow-right"></i></a> -->
                </div>
            </div>
        </section>

        <center>
            <section id="routes-ports" class="section-title">
                <div class="title" style="margin-top: 90px;">
                    <p>Routes & Ports</p>
                </div>
            </section>
        </center>

        <section>
            <section class="routes-ports-section">

                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-7">
                            <img src="./static/img/DSC09025-1280x720.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-5">
                            <div class="card-body">
                                <h5 class="card-title text-center">Routes & Schedules</h5>
                                <p class="card-text text-start">Plan your logistics effectively with our Routes &
                                    Schedules category.
                                    Access up-to-date information on shipping routes and schedules to optimize your
                                    cargo transit.</p>
                                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small>
                                </p>
                                <!-- <a href="#" class="card-link">Learn More <i class="fa-solid fa-arrow-right"></i></a> -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-7 order-2 f-r">
                            <img src="./static/img/DSC08634-1280x720.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-5 order-1 fl-">
                            <div class="card-body">
                                <h5 class="card-title text-center">Port Tariffs</h5>
                                <p class="card-text text-end">Easily manage port-related expenses with our Port Tariffs
                                    category.
                                    Access transparent information on pricing, fees, and charges to streamline your
                                    shipping operations
                                    effectively.</p>
                                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small>
                                </p>
                                <!-- <a href="#" class="card-link f-r"><i class="fa-solid fa-arrow-left"></i> Learn More</a> -->
                            </div>
                        </div>
                    </div>
                </div>

            </section>

        </section>
    </div>










    <section style="margin-top: 100px;">
        <!-- Footer 2 - Bootstrap Brain Component -->
        <footer class="footer" style="clear: both;">

            <!-- Widgets - Bootstrap Brain Component -->
            <section class="border-top" style="border-color: #747264 !important;">
                <div class="container overflow-hidden" style="margin-top: 15px;">
                    <div class="row gy-4 gy-lg-0 justify-content-xl-between">
                        <div class="col-12 col-md-4 col-lg-3 col-xl-2">
                            <div class="widget">
                                <h4 class="widget-title mb-4">Get in Touch</h4>
                                <address class="mb-4 off-white">Beirut - Quarantaine Region P.O. Box 1490 Beirut Lebanon
                                </address>
                                <p class="mb-1">
                                    <a class="link-secondary text-decoration-none" href="tel:+961 1 580 211">+961 1 580
                                        211</a>
                                </p>
                                <p class="mb-0">
                                    <a class="link-secondary text-decoration-none"
                                        href="mailto:info@acccbeirutport.gov.lb">info@acccbeirutport.gov.lb</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-3 col-xl-2">
                            <div class="widget">
                                <h4 class="widget-title mb-4">Learn More</h4>
                                <ul class="list-unstyled">
                                    <li class="mb-2">
                                        <a href="#!" class="link-secondary text-decoration-none">About</a>
                                    </li>
                                    <li class="mb-2">
                                        <a href="#!" class="link-secondary text-decoration-none">Contact</a>
                                    </li>
                                    <li class="mb-2">
                                        <a href="#!" class="link-secondary text-decoration-none">Advertise</a>
                                    </li>
                                    <li class="mb-2">
                                        <a href="#!" class="link-secondary text-decoration-none">Terms of Service</a>
                                    </li>
                                    <li class="mb-0">
                                        <a href="#!" class="link-secondary text-decoration-none">Privacy Policy</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 col-xl-4">
                            <div class="widget">
                                <h4 class="widget-title mb-4">Our Newsletter</h4>
                                <p class="mb-4 off-white">Subscribe to our newsletter to get our news &
                                    discounts delivered to you.
                                </p>
                                <form action="#!">
                                    <div class="row gy-4">
                                        <div class="col-12">
                                            <div class="input-group">
                                                <span class="input-group-text transparent-bg"
                                                    id="email-newsletter-addon">
                                                    <i class="fa-regular fa-envelope fa-white"></i>
                                                </span>
                                                <input type="email" class="form-control transparent-bg off-white"
                                                    id="email-newsletter" value="" placeholder="Email Address"
                                                    aria-label="email-newsletter"
                                                    aria-describedby="email-newsletter-addon" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button class="btn btn-primary" type="submit">Subscribe</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Copyright - Bootstrap Brain Component -->
            <div class="py-4 py-md-5 py-xl-8 border-top" style="border-color: #3C3633 !important; margin-top: 15px;">
                <div class="container overflow-hidden">
                    <div class="row gy-4 gy-md-0">
                        <div class="col-xs-12 col-md-7 order-1 order-md-0">
                            <div class="copyright text-center text-md-start whiten">
                                &copy; 2024. All Rights Reserved.
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-5 order-0 order-md-1">
                            <ul class="nav justify-content-center justify-content-md-end">
                                <li class="nav-item">
                                    <a class="nav-link link-dark" href="https://www.facebook.com/portdebeyrouth"
                                        target="_blank">
                                        <i class="fa-brands fa-facebook fa-xl fa-white"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link link-dark" href="https://twitter.com/portdebeyrouth"
                                        target="_blank">
                                        <i class="fa-brands fa-twitter fa-xl fa-white"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link link-dark" href="https://www.instagram.com/portdebeyrouth"
                                        target="_blank">
                                        <i class="fa-brands fa-instagram fa-xl fa-white"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </footer>
        <!-- Footer 2 - Bootstrap Brain Component -->
    </section>










    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
        crossorigin="anonymous"></script>
    <script src="./static/js/home_translate.js"></script>

    <script>
        const elements = document.querySelectorAll('.num');

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    let valueDisplays = document.querySelectorAll(".num");
                    let interval = 100;

                    function formatNumber(num) {
                        if (num >= 1000000000) {
                            return (num / 1000000000).toFixed(1) + 'B'; // Billion
                        } else if (num >= 1000000) {
                            return (num / 1000000).toFixed(1) + 'M'; // Million
                        } else if (num >= 1000) {
                            return (num / 1000).toFixed(1) + 'K'; // Thousand
                        } else if (num > 0) {
                            let formatted = num.toFixed(1);
                            if (num % 1 === 0) {
                                formatted = formatted.replace(/\.0$/, '');
                            }
                            return formatted;
                        } else {
                            return '0'; // Changed this line
                        }
                    }

                    valueDisplays.forEach((valueDisplay) => {
                        let startValue = 0;
                        let endValue = parseInt(valueDisplay.getAttribute("data-val"));
                        let increment = Math.ceil(endValue / 10); // Calculate increment value
                        let counter = 0;

                        let intervalId = setInterval(function () {
                            startValue += increment;
                            valueDisplay.textContent = formatNumber(startValue);
                            counter++;

                            if (counter >= 10) {
                                valueDisplay.textContent = formatNumber(endValue); // Ensure final value is exact
                                clearInterval(intervalId);
                            }
                        }, interval);
                    });
                }
            });
        },
            {
                threshold: 1.0,
            }
        );

        elements.forEach((element) => {
            observer.observe(element);
        });
    </script>

    <script>
        fetch('https://api.ipify.org?format=json')
        .then(response => response.json())
        .then(response => {
            
            fetch(
                "./pages/php/add_visits.php",
                {
                    method: 'POST',
                    body: new URLSearchParams({
                        IPaddress: response['ip'],
                    })
                }
            )
        });
    </script>


</body>

</html>