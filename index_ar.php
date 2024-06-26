<?php 
    include ("./pages/php/tools.php");
?>

<!doctype html>
<html lang="ar">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-thin.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-light.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./static/css/index.css">
    <link rel="stylesheet" href="./static/css/main-colors.css">
    <link rel="shortcut icon" href="./static/img/favicon.ico" type="image/x-icon">
    <title>مشروع مرفأ بيروت لشركة ACCC</title>
</head>

<body>
    <section id="header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <img src="./static/img/logo-only.png" alt="" style="width: 7ex;">
                    <a class="navbar-brand theme-text" href="#">
                        مرفأ بيروت لشركة ACCC
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link act" aria-current="page" href="#">الصفحة الرئيسية</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#services">الخدمات</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#routes-ports">المسارات والموانئ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./pages/html/ar/aboutus.html">من نحن</a>
                                </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./pages/html/ar/contactus.html">اتصل بنا</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./index.php">EN</a>
                            </li>
                            <li class="nav-item">
                                <!-- <a class="nav-link" href="./pages/html/ar/login.html">تسجيل الدخول <i
                                        class="fa-solid fa-sign-in"></i></a> -->
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
                                                echo "<a class='nav-link' href='./pages/html/$page/dashboard.php'>لوحة التحكم</a>";
                                            }
                                            else {
                                                echo '<a class="nav-link" href="./pages/html/ar/login.php">تسجيل الدخول 
                                                <i class="fa-solid fa-sign-in"></i>
                                            </a>';
                                            }
                                        }
                                        else {
                                            echo '<a class="nav-link" href="./pages/html/ar/login.php">تسجيل الدخول 
                                            <i class="fa-solid fa-sign-in"></i>
                                        </a>';
                                        }
                                    }
                                    else {
                                        echo '<a class="nav-link" href="./pages/html/ar/login.php">تسجيل الدخول 
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
                <h1 class="text-white display-3 fw-bold">نحن نساعدك في <span class="theme-text">استيراد / تصدير</span>
                    الشحنات التي ترغب فيها.</h1>
            </div>
        </div>
    </section>


    <section class="counter">
        <div class="counter-container">
            <div class="counter-item">
                <h2>1M</h2>
                <p>السفن المغادرة اليوم</p>
            </div>
            <div class="counter-item">
                <h2>5M</h2>
                <p>السفن التي تم خدمتها</p>
            </div>
            <div class="counter-item">
                <h2>100M</h2>
                <p>الأعضاء الموثوق بهم</p>
            </div>
            <div class="counter-item">
                <h2>500M</h2>
                <p>الدخل الكلي</p>
            </div>
        </div>
    </section>
    



    <div class="explanation">
        <center>
            <section id="services" class="section-title">
                <div class="title">
                    <p>الخدمات</p>
                </div>
            </section>
        </center>

        <section class="services-section">
            <div class="card w-card">
                <img src="./static/img/Port-of-Beirut.jpg" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title">الشحنات</h5>
                    <p class="card-text">اكتشف المسارات البحرية الفعالة والجداول الزمنية في قسم المسارات والجداول
                        الزمنية لدينا.
                        خطط بسلاسة رحلتك بدقة.</p>
                    <!-- <a href="#" class="card-link">تعلم المزيد <i class="fa-solid fa-arrow-right"></i></a> -->
                </div>
            </div>

            <div class="card w-card">
                <img src="./static/img/1622810090Door-to-door-delivery.png" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title">من الباب إلى الباب</h5>
                    <p class="card-text">استكشف فئة من الباب إلى الباب لدينا لنقل الشحن بسلاسة من الموانئ إلى الوجهات
                        النهائية.
                        قم بتبسيط رحلتك اللوجستية بسهولة.</p>
                    <!-- <a href="#" class="card-link">تعلم المزيد <i class="fa-solid fa-arrow-right"></i></a> -->
                </div>
            </div>

            <div class="card w-card">
                <img src="./static/img/4ae6b35e-785e-4fe2-bcc3-eceb517308bc_1.webp" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title">من رصيف إلى رصيف</h5>
                    <p class="card-text">قم بتبسيط رحلة الشحن الخاصة بك من رصيف إلى رصيف مع فئتنا المخصصة للرصيف إلى
                        الرصيف.
                        اعثر على حلول فعالة للغاية للخدمات اللوجستية من ميناء إلى ميناء بسهولة.</p>
                    <!-- <a href="#" class="card-link">تعلم المزيد <i class="fa-solid fa-arrow-right"></i></a> -->
                </div>
            </div>

            <div class="card w-card">
                <img src="./static/img/gps-tracking-icon-logo-illustration-tracking-symbol-template-for-graphic-and-web-design-collection-free-vector_1.jpg"
                    class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title">التتبع</h5>
                    <p class="card-text">ابق مطلعًا على كل خطوة في الطريق مع فئة التتبع لدينا.
                        راقب رحلة شحنتك بسهولة من المنشأ إلى الوجهة، مما يضمن الشفافية والراحة النفسية.</p>
                    <!-- <a href="#" class="card-link">تعلم المزيد <i class="fa-solid fa-arrow-right"></i></a> -->
                </div>
            </div>
        </section>

        <center>
            <section id="routes-ports" class="section-title">
                <div class="title" style="margin-top: 90px;">
                    <p>المسارات والموانئ</p>
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
                                <h5 class="card-title text-center">المسارات والجداول الزمنية</h5>
                                <p class="card-text text-start">قم بتخطيط لوجستيتك بفعالية مع فئة المسارات والجداول
                                    الزمنية.
                                    الوصول إلى معلومات محدثة حول مسارات الشحن والجداول الزمنية لتحسين عبور الشحنات
                                    الخاصة بك.</p>
                                <p class="card-text"><small class="text-body-secondary">تم التحديث في غضون 3
                                        دقائق</small></p>
                                <!-- <a href="#" class="card-link">تعلم المزيد <i class="fa-solid fa-arrow-right"></i></a> -->
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
                                <h5 class="card-title text-center">تعرفة الميناء</h5>
                                <p class="card-text text-end">قم بإدارة مصاريف ذات صلة بالميناء بسهولة مع فئة تعرفة
                                    الميناء لدينا.
                                    الوصول إلى معلومات شفافة حول التسعير والرسوم والرسوم لتبسيط عمليات الشحن الخاصة بك
                                    بفعالية.</p>
                                <p class="card-text"><small class="text-body-secondary">تم التحديث في غضون 3
                                        دقائق</small></p>
                                <!-- <a href="#" class="card-link f-r"><i class="fa-solid fa-arrow-left"></i> تعلم المزيد</a> -->
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
                                <h4 class="widget-title mb-4">تواصل معنا</h4>
                                <address class="mb-4 off-white">بيروت - منطقة الحجر الصحي صندوق بريد 1490 بيروت لبنان
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
                                <h4 class="widget-title mb-4">تعلم أكثر</h4>
                                <ul class="list-unstyled">
                                    <li class="mb-2">
                                        <a href="./pages/html/ar/aboutus.html" class="link-secondary text-decoration-none">حول</a>
                                    </li>
                                    <li class="mb-2">
                                        <a href="./pages/html/ar/contactus.html" class="link-secondary text-decoration-none">اتصل</a>
                                    </li>
                                    <li class="mb-0">
                                        <a data-bs-toggle="modal" data-bs-target="#privacy-modal" class="link-secondary text-decoration-none">سياسة الخصوصية</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 col-xl-4">
                            <div class="widget">
                                <h4 class="widget-title mb-4">النشرة الإخبارية لدينا</h4>
                                <p class="mb-4 off-white">اشترك في النشرة الإخبارية لدينا للحصول على أخبارنا و
                                    الخصومات المقدمة إليك.
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
                                                    id="email-newsletter" value="" placeholder="عنوان البريد الإلكتروني"
                                                    aria-label="email-newsletter"
                                                    aria-describedby="email-newsletter-addon" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button class="btn btn-primary" type="submit">اشتراك</button>
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
                                &copy; 2024. كل الحقوق محفوظة.
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
     <!-- Privacy Policy Modal Start -->
     <section>

        <div class="modal fade" id="privacy-modal" tabindex="-1" aria-labelledby="privacy-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">سياسة الخصوصية</h5>
              </div>
              <div class="modal-body">
                <p><b>مقدمة:</b> تحدد سياسة الخصوصية هذه كيفية جمع واستخدام ومشاركة وحماية المعلومات الشخصية في ACCC مرفأ بيروت. نحن ملتزمون بالحفاظ على الثقة والاحترام لزوارنا ومستخدمينا.<hr>
                
                <b>ما هي المعلومات التي نجمعها:</b> نجمع المعلومات الشخصية، بما في ذلك على سبيل المثال لا الحصر:<br>
                <ul>
                    <li>معلومات الاتصال (الاسم، البريد الإلكتروني، رقم الهاتف)</li>
                    <li>معلومات الموقع (عنوان IP، الموقع الجغرافي)</li>
                    <li>معلومات الجهاز (نوع المتصفح، نظام التشغيل)</li>
                    <li>معلومات الاستخدام (الصفحات التي تمت زيارتها، استعلامات البحث)</li>
                </ul>
                <hr>
                
                <b>كيفية جمع المعلومات:</b> نجمع المعلومات من خلال:<br>
                <ul>
                    <li>إدخال مباشر من المستخدمين (مثل نماذج الاتصال، الاستبيانات)</li>
                    <li>الكوكيز والتقنيات الأخرى للتتبع</li>
                    <li>الخدمات المقدمة من الأطراف الثالثة (مثل مزودي التحليلات)</li>
                </ul>
                <hr>
                <b>لماذا نجمع المعلومات:</b> نجمع المعلومات من أجل:
                <ul>
                    <li>تقديم وتحسين خدماتنا</li>
                    <li>تحسين تجربة المستخدم</li>
                    <li>التواصل مع المستخدمين</li>
                    <li>الامتثال للمتطلبات القانونية</li>
                </ul>
                <hr>
                
                <b>كيفية مشاركة المعلومات:</b> نشارك المعلومات مع:
                <ul>
                    <li>مقدمي الخدمات من الأطراف الثالثة (مثل مزودي التحليلات، معالجي الدفع)</li>
                    <li>وكالات إنفاذ القانون (كما هو مطلوب بموجب القانون)</li>
                    <li>أطراف أخرى (بموافقة المستخدم)</li>
                </ul>
                <hr>
                
                <b>حقوق المستخدمين:</b> للمستخدمين الحق في:
                <ul>
                    <li>طلب الوصول إلى معلوماتهم الشخصية</li>
                    <li>طلب تصحيح أو حذف معلوماتهم الشخصية</li>
                    <li>الاعتراض على معالجة معلوماتهم الشخصية</li>
                    <li>طلب تقييد معالجة معلوماتهم الشخصية</li>
                    <li>طلب نقل البيانات</li>
                </ul>
                <hr>
                
                <b>الأمان:</b> نتخذ تدابير معقولة لحماية المعلومات الشخصية من الوصول غير المصرح به أو الكشف أو التدمير. <br><hr>
                
                <b>التغييرات على هذه السياسة:</b> نحتفظ بالحق في تعديل سياسة الخصوصية هذه في أي وقت. سيتم نشر التغييرات على هذه الصفحة.<br><hr>
                
                <b>اتصل بنا:</b> إذا كانت لديك أي أسئلة أو مخاوف بشأن سياسة الخصوصية هذه، يرجى الاتصال بنا على [بريد الاتصال الإلكتروني أو العنوان].<br><hr>
                
                باستخدام موقعنا الإلكتروني، فإنك توافق على جمع واستخدام ومشاركة معلوماتك الشخصية كما هو موضح في سياسة الخصوصية هذه.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal"><i class="fa-sharp fa-light fa-circle-check"></i></button>
            </div>
             <!-- Privacy Policy Modal End -->  

</body>

</html>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
    crossorigin="anonymous"></script>
<script src="./static/js/home_translate.js"></script>
<script>
    function showPPmodal(){
        $("#privacy-modal").modal();
    }

</script>  


</body>

</html>