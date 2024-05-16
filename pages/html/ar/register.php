<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link rel="stylesheet" href="../../../static/css/credentials.css">
    <link rel="stylesheet" href="../../../static/css/register.css">
    <title>مرفأ بيروت للتجارة</title>
</head>

<body>
    <div class="wrapper">
        <form class="login">
            <p class="title">إنشاء حساب</p>
            <input type="text" placeholder="اسم المستخدم" autofocus />
            <i class="fa-solid fa-user"></i>
            <input type="text" placeholder="البريد الإلكتروني" />
            <i class="fa-solid fa-envelope"></i>
            <input type="password" placeholder="كلمة المرور" id="id_password1" />
            <i class="fa-solid fa-key"></i>
            <i class="fa-regular fa-eye" id="togglePassword1" onclick="update_password_eye('togglePassword1', 'id_password1')"></i>
            <input type="password" placeholder="تأكيد كلمة المرور" id="id_password2" />
            <i class="fa-solid fa-key"></i>
            <i class="fa-regular fa-eye" id="togglePassword2" onclick="update_password_eye('togglePassword2', 'id_password2')"></i>
            <p style="float: right;">لديك حساب بالفعل؟ <a href="../ar/login.html">تسجيل الدخول</a>.</p>
            <input type="submit" value="إنشاء الحساب" />
        </form>
        <a href="../../../index_ar.html" style="margin-top: 2.5ex; font-size: 3ex; color: var(--main-color);"><i
                class="fa-solid fa-arrow-left"></i> الصفحة الرئيسية</a>
    </div>

    <script src="../../../static/js/credentials.js"></script>
</body>

</html>
