<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../../static/css/credentials.css">
    <link rel="stylesheet" href="../../../static/css/login.css">
    <link rel="shortcut icon" href="../../../static/img/favicon.ico" type="image/x-icon">
    <title>ACCC Beirut Port</title>
</head>

<body>

    </div>
    <div class="wrapper">
        <form class="login" method="post" action="../../php/login.php">
            <p class="title">Sign IN</p>
            <p class="email_alert"><?php if(isset($_GET['email_msg'])) {echo $_GET['email_msg'];} ?></p>
            <input type="text" placeholder="Email" name="email" autofocus />
            <i class="fa-solid fa-envelope"></i>
            <p class="password_alert"><?php if(isset($_GET['password_msg'])) {echo $_GET['password_msg'];} ?></p>
            <input type="password" placeholder="Password" name="pass" id="id_password" />
            <i class="fa-solid fa-key"></i>
            <i class="fa-regular fa-eye" id="togglePassword" style="font-size: 2.5ex" onclick="update_password_eye('togglePassword', 'id_password')"></i>
            <input type="text" name="lang" value="en" hidden>
            <a href="./forgot-password.html" style="float: left;">Forgot your password?</a>
            <p style="float: right;">Don't have an account <a href="./register.php">Register</a>.</p>
            <input type="submit" value="login" />
        </form>
        <a href="../../../index.php" style="margin-top: 2.5ex; font-size: 3ex; color: var(--main-color);"><i
                class="fa-solid fa-arrow-left"></i> Home</a>
    </div>

    <script src="../../../static/js/credentials.js"></script>
</body>


</html>