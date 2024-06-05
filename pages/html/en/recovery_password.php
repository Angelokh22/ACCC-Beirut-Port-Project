<?php 

    include "../../php/tools.php";

    if(isset($_GET['token']) && !empty($_GET['token'])) {
        $jwt = $_GET['token'];

        $result = send_query("SELECT * FROM `UserReset` WHERE resetToken = '$jwt'", true, false, []);
        if(!$result) {
            header("location: /");
        }

        $userid = read_jwt($jwt)['user'];

        $email = send_query("SELECT `userEmail` FROM `Users` WHERE userID = '$userid'", true, false, [])['userEmail'];
    }


?>

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
    <link rel="stylesheet" href="../../../static/css/recovery_password.css">
    <title>ACCC Beirut Port</title>
</head>

<body>

    </div>
    <div class="wrapper">
        <section class="login">
            <p class="title">Reset your password</p>
            <input type="text" placeholder="Email" value="<?php echo $email ?>" disabled style="color: white;" />
            <input type="password" placeholder="Password" id="id_password1" />
            <i class="fa-solid fa-key"></i>
            <i class="fa-regular fa-eye" id="togglePassword1" style="font-size: 2.5ex" onclick="update_password_eye('togglePassword1', 'id_password1')"></i>
            <input type="password" placeholder="Password" id="id_password2" />
            <i class="fa-solid fa-key"></i>
            <i class="fa-regular fa-eye" id="togglePassword2" style="font-size: 2.5ex" onclick="update_password_eye('togglePassword2', 'id_password2')"></i>
            <input type="submit" value="Set new password">
        </section>
    </div>

    <script src="../../static/js/credentials.js"></script>
    <script>

        var password = document.getElementById("togglePassword1").value;
        var confirmPassword = document.getElementById("togglePassword2").value;

        fetch(
            ""
        )

    </script>
</body>


</html>