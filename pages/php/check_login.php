<?php
    include "tools.php";

    session_start();
    $jwt = $_SESSION['Authorisation'];

    if(!$jwt) {
        header("Location: /index.php");
    }

    $query = "SELECT * FROM Sessions WHERE sessionToken = '$jwt'";

    $result = send_query($query, true, false);
    if(!$result) {
        session_destroy();
        header("Location: /index.php");
    }

?>