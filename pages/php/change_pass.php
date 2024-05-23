<?php

    include ("tools.php");

    if(
        isset($_POST["oldPass"]) && $_POST['oldPass'] != ""
        &&
        isset($_POST["newPass"]) && $_POST['newPass'] != ""
        &&
        isset($_POST["confPass"]) && $_POST['confPass'] != ""
    )
    {

        session_start();

        $jwt = $_SESSION["Authorisation"];
        if(!$jwt){
            header("Location:../../../../index.php");
        }
        $session_result = send_query("SELECT * FROM Sessions WHERE sessionToken = '$jwt'", true, false);
        if(!$session_result){
            session_destroy();
            header("Location:../../../../index.php");
        }
        $userid = $session_result[0]['userID'];


        $OldPass = $_POST['oldPass'];
        $NewPass = $_POST['newPass'];
        $ConfPass = $_POST['confPass'];

        if($NewPass != $ConfPass){
            echo "NO1";
            return;
        }
        if(check_input($NewPass, false) != 1 || check_input($ConfPass, false) != 1){
            echo "NO2";
            return;
        }

        $oldpassword = send_query("SELECT userPassword FROM Users WHERE userID = '$userid';", true, false)[0];
        // echo "<script>alert('$oldpassword')</script>";
        // echo "<script>alert('$OldPass')</script>";
        if($oldpassword != $OldPass){
            echo $oldpassword;
            // print_r($oldpassword);
            return;
        }

        send_query("UPDATE Users SET userPassword = '$NewPass' WHERE userID = '$userid'", false);
        echo "OK";

    }
    else {
        echo "NO4";
    }

?>