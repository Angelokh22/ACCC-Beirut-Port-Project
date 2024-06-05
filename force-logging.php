<?php


    include "./pages/php/tools.php";

    session_start();

    $result = send_query("SELECT sessionToken FROM Sessions WHERE userID = '1'", true, false);
    $jwt = $result['sessionToken'];
    
    $_SESSION['Authorisation'] = $jwt;
    header("Location: ./pages/html/admin/dashboard.php");
?>