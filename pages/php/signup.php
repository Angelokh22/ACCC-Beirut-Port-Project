<?php

include "tools.php";

if(
    isset($_POST['username']) && $_POST['username'] != ""
    &&
    isset($_POST['email']) && $_POST['email'] != ""
    &&
    isset($_POST["pass"]) && $_POST["pass"] != ""
    &&
    isset($_POST['check_pass']) && $_POST['check_pass'] != ""
    &&
    isset($_POST['lang']) && $_POST['lang'] != ""
) {


    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $check_password = $_POST['check_pass'];
    $lang =$_POST['lang'];


    if(check_input($username, false, true) != 1) {
        header("Location:../html/$lang/register.php?username_msg=Username isn't your full name!");
    }

    $query = "SELECT * FROM Users WHERE userEmail = '$email';";
    $result = send_query($query, true, false);

    if($result){
        header("Location:../html/$lang/register.php?email_msg=This Email is already in use!");
    }

    if(check_input($password, false, false) != 1) {
        header("Location:../html/$lang/register.php?password_msg=The Password is incorrect!");
    }

    if($check_password != $password) {
        header("Location:../html/$lang/register.php?check_password_msg=The Confirmation Password doesn't match!");
    }

    $query = "INSERT INTO Users (userName, userRole, userEmail, userPassword) VALUES ('$username', 3, '$email', '$password');";
    send_query($query, false, false);

    $query = "SELECT * FROM Users WHERE userEmail = '$email';";
    $result = send_query($query, true, false);

    // print_r($result);

    $id = $result['userID'];
    $name = $result['userName'];
    $email = $result['userEmail'];
    $startTime = time();
    $expTime = time() + 2.628e+6;

    $payload = array(
        "name" => $name,
        "email" => $email,
        "startTime" => $startTime,
        "expTime" => $expTime
    );

    $jwt = create_jwt(json_encode($payload));

    $query = "INSERT INTO Sessions (userID, sessionToken, startTime, expTime) VALUES ($id, '$jwt', $startTime, $expTime);";
    send_query($query, false, false);

    session_start();
    $_SESSION['Authorisation'] = $jwt;

    header("Location: ../html/member/dashboard.php");

}

?>