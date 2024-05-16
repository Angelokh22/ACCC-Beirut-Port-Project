<!DOCTYPE html>
<html lang="en">

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
    <title>ACCC Beirut Port</title>
</head>

<body>
    <div class="wrapper">
        <form class="login" method="POST" action="../../php/signup.php">
            <p class="title">Sign UP</p>
            <p class="username_alert"><?php if(isset($_GET['username_msg'])) {echo $_GET['username_msg'];} ?></p>
            <input type="text" placeholder="Username" name="username" autofocus />
            <i class="fa-solid fa-user"></i>
            <p class="email_alert"><?php if(isset($_GET['email_msg'])) {echo $_GET['email_msg'];} ?></p>
            <input type="text" placeholder="Email" name="email" />
            <i class="fa-solid fa-envelope"></i>
            <p class="password_alert"><?php if(isset($_GET['password_msg'])) {echo $_GET['password_msg'];} ?></p>
            <input type="password" placeholder="Password" id="id_password1" name="pass" />
            <i class="fa-solid fa-key"></i>
            <i class="fa-regular fa-eye" id="togglePassword1" onclick="update_password_eye('togglePassword1', 'id_password1')"></i>
            <p class="check_password_alert"><?php if(isset($_GET['check_password_msg'])) {echo $_GET['check_password_msg'];} ?></p>
            <input type="password" placeholder="Confirm Password" id="id_password2" name="check_pass" />
            <i class="fa-solid fa-key"></i>
            <i class="fa-regular fa-eye" id="togglePassword2" onclick="update_password_eye('togglePassword2', 'id_password2')"></i>
            <p style="float: right;">Have an account <a href="./login.php">Login</a>.</p>
            <input type="text" hidden name="lang" value="en">
            <input type="submit" value="Create account" />
        </form>
        <a href="../../../index.html" style="margin-top: 2.5ex; font-size: 3ex; color: var(--main-color);"><i
                class="fa-solid fa-arrow-left"></i> Home</a>
    </div>

    <script src="../../../static/js/credentials.js"></script>
</body>

</html>