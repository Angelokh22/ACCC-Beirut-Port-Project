<?php

include "../../php/tools.php";
if (isset($_GET['id']) && !empty($_GET['id'])) {
    
    $resetid=$_GET['id'];
    $result=send_query("SELECT * FROM `UserReset` WHERE resetID='$resetid'", true, false, []);
    
    if (!$result) {
        header("location: /");
    }
    $id = $_GET['id'];
}
else {
    header("location: /");
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-thin.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-light.css">
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link rel="stylesheet" href="../../../static/css/credentials.css">
    <title>ACCC Beirut Port</title>

    <style>
        input[type='text'] {
            border-left-width: 0px !important;
            font-size: x-large !important;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <section class="login">
            <p class="title">One Time Password</p>

            <input type="text" id="id" value="<?php echo $id; ?>" hidden>

            <div class="row pt-4 pb-2">
                <div class="col">
                    <input class="otp-letter-input" type="text" maxlength="1">
                </div>
                <div class="col">
                    <input class="otp-letter-input" type="text" maxlength="1">
                </div>
                <div class="col">
                    <input class="otp-letter-input" type="text" maxlength="1">
                </div>
                <div class="col">
                    <input class="otp-letter-input" type="text" maxlength="1">
                </div>
                <div class="col">
                    <input class="otp-letter-input" type="text" maxlength="1">
                </div>
                <div class="col">
                    <input class="otp-letter-input" type="text" maxlength="1">
                </div>
            </div>
            <input type="submit" value="Verify" onclick="send_otp()" />
        </section>
        <a href="../../../index.php" style="margin-top: 2.5ex; font-size: 3ex; color: var(--main-color);"><i class="fa-solid fa-arrow-left"></i> Home</a>
    </div>


    <!-- POPUP Modal Start -->
    <section>

        <div class="modal fade" id="popupModal" tabindex="-1" aria-labelledby="popupModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa-sharp fa-light fa-circle-xmark"></i></button>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- POPUP Modal End -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>
        function send_otp() {
            var id = document.getElementById("id").value;
            var code1 = document.getElementsByTagName("input")[1].value;
            var code2 = document.getElementsByTagName("input")[2].value;
            var code3 = document.getElementsByTagName("input")[3].value;
            var code4 = document.getElementsByTagName("input")[4].value;
            var code5 = document.getElementsByTagName("input")[5].value;
            var code6 = document.getElementsByTagName("input")[6].value;

            var full_code = code1 + code2 + code3 + code4 + code5 + code6;

            fetch(
                    "../../php/manage-password.php", {
                        method: 'POST',
                        body: new URLSearchParams({
                            "action": "otp",
                            "code": full_code,
                            "id": id
                        })
                    }
                )
                .then(response => (response.json()))
                .then(response => {
                    if (response['success'] == true) {
                        window.location.href = response['redirect'];
                    } else {
                        document.getElementsByClassName("modal-body")[0].innerHTML = `<p style="color: black;">${response['error']}</p>`;
                        $("#popupModal").modal('show');
                    }
                })
        }
    </script>


</body>

</html>