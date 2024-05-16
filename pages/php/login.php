<?php

include('tools.php');
include ('connection.php');

if(
    isset($_POST['email']) && $_POST['email'] !=""
    &&
    isset($_POST['pass']) && $_POST['pass'] !=""
    &&
    isset($_POST['lang']) && $_POST['lang'] != ""
) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $lang = $_POST['lang'];
    
    
    if(check_input($email) != 1){// || check_input($pass, false) != 1){
        header("Location: ../html/$lang/login.php?email_msg=Invalid Email");
    }
    if(check_input($pass, false) != 1){
        header("Location: ../html/$lang/login.php?password_msg=Invalid Password");

    }

    $query="Select * From Users where userEmail='$email' and userPassword='$pass'";
    $result = send_query($query, false);


    if(!$result) {
        header("Location:../html/$lang/login.php?email_msg=Email or Password is incorrect");
    }
    
    $id = $result['userID'];
    $role = $result['userRole'];
    $name = $result['userName'];
    $email = $result['userEmail'];
    $startTime = time();
    $expTime = $startTime + 2.628e+6;

    $payload = array(
        "name" => $name,
        "email" => $email,
        "startTime" => $startTime,
        "expTime" => $expTime
    );

    $jwt = create_jwt(json_encode($payload));
    
    session_start();
    $_SESSION['Authorisation'] = $jwt;
    
    $query = "INSERT INTO Sessions (userID, sessionToken, startTime, expTime) VALUES ($id, '$jwt', $startTime, $expTime);";
    send_query($query, false);


    if($role == '1'){
        header("Location:../html/admin/dashboard.php");
    }
    else if($role == '2'){
        header("Location:../html/worker/dashboard.php");
    }
    else{
        header("Location:../html/member/dashboard.php");
    }
}
?>