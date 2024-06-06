<?php

include "../../php/tools.php";

if (isset($_GET['token']) && !empty($_GET['token'])) {
    $jwt = $_GET['token'];

    $result = send_query("SELECT * FROM `UserReset` WHERE resetToken = '$jwt'", true, false, []);
    if (!$result) {
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
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-thin.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-light.css">
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
            <input type="password" placeholder="Confirm Password" id="id_password2" />
            <i class="fa-solid fa-key"></i>
            <i class="fa-regular fa-eye" id="togglePassword2" style="font-size: 2.5ex" onclick="update_password_eye('togglePassword2', 'id_password2')"></i>
            <input type="submit" value="Set new password" onclick="change_password()">
        </section>
    </div>

    <!-- POPUP Modal Start -->
    <section>

        <div class="modal fade" id="popupModal" data-backdrop="false" data-keyboard="false" tabindex="-1" aria-labelledby="popupModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- POPUP Modal End -->

    <script src="../../../static/js/credentials.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <script>
        function change_password() {
            var password = document.getElementById("id_password1").value;
            var confirmPassword = document.getElementById("id_password2").value;

            fetch(
                    "../../php/manage-password.php", {
                        method: 'POST',
                        body: new URLSearchParams({
                            'password': password,
                            'confirmPassword': confirmPassword,
                            'token': '<?php echo $jwt ?>',
                            'action': 'edit'
                        })
                    }
                )
                .then(response => (response.json()))
                .then(response => {
                    if (response['success'] == true) {
                        document.getElementsByClassName("modal-body")[0].innerHTML = `<p style="color: black;">${response['message']}</p>`;
                        document.getElementsByClassName("modal-footer")[0].innerHTML = `<button type="button" class="btn btn-success" onclick="go_home()"><i class="fa-sharp fa-light fa-circle-check"></i></button>`;
                    } else {
                        document.getElementsByClassName("modal-body")[0].innerHTML = `<p style="color: black;">${response['error']}</p>`;
                        document.getElementsByClassName("modal-footer")[0].innerHTML = `<button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-sharp fa-light fa-circle-xmark"></i></button>`;
                    }
                    $("#popupModal").modal("show");
                })
        }

        function go_home() {
            window.location.href = "/";
        }
    </script>
</body>


</html>