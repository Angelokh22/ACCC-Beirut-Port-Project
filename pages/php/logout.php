<?php

include('tools.php');


session_start();

$token = $_SESSION['Authorisation'];

$query = "DELETE FROM Sessions WHERE sessionToken = '$token'";
send_query($query, false, false);

session_destroy();

header("Location: ../../index.php")


?>