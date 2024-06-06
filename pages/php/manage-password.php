<?php

    // include "check_login.php";
    include "tools.php";
    include "send-email.php";


    if(
        isset($_POST["action"]) && $_POST['action'] == 'mail'
        &&
        isset($_POST['to']) && !empty($_POST['to'])
        &&
        isset($_POST['root']) && !empty($_POST['root'])
    )
    {

        $email = $_POST['to'];

        $query = "SELECT `userID` FROM `Users` WHERE `userEmail` = :email";
        $result = send_query($query, true, false, ["email" => $email]);
        // print_r($result['userID']);
        if($result) {
            $userid = $result['userID'];
            $jwt = create_jwt(json_encode(['user' => $userid, 'time' => time()]));
            $query = "INSERT INTO `UserReset` VALUES (NULL, :token, NULL)";
            send_query($query, false, false, ['token' => $jwt]);

            $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http';
            $url = $_POST['root'];
            $url .= "/pages/html/en/recovery_password.php?token=".$jwt;

            send_mail($email,"Password Recovery Email", $url);    

        }
        else {
            echo "No results";
        }



    }
    else if (
        isset($_POST["action"]) && $_POST['action'] == 'otp'
        &&
        isset($_POST['code']) && !empty($_POST['code'])
        &&
        isset($_POST['id']) && !empty($_POST['id'])
    )
    {

        $id = $_POST['id'];
        $otp = $_POST['code'];

        $query = "SELECT `resetToken` FROM `UserReset` WHERE resetID = '$id' AND resetOTP = '$otp'";
        $result = send_query($query, true, false, []);
        if(!$result) {
            echo json_encode(["success" => false, "error" => "Incorrect Code"]);
            exit;
        }

        $jwt = $result['resetToken'];
        echo json_encode(["success" => true, "redirect" => "./recovery_password?token=$jwt"]);
        exit;

    }
    else if (
        isset($_POST["action"]) && $_POST['action'] == 'edit'
        &&
        isset($_POST['password']) && !empty($_POST['password'])
        &&
        isset($_POST['confirmPassword']) && !empty($_POST['confirmPassword'])
        &&
        isset($_POST['token']) && !empty($_POST['token'])
    )
    {

        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $jwt = $_POST['token'];

        if(!check_input($password, false, false)) {
            echo json_encode(["success" => false, "error" => "Password Incorrect"]);
            exit;
        }

        if($password != $confirmPassword) {
            echo json_encode(["success"=> false, "error" => "Passwords doesn't match"]);
        }

        $query = "SELECT * FROM UserReset WHERE resetToken = '$jwt'";
        $result = send_query($query, true, false, []);

        if(!$result) {
            echo json_encode(["success"=> false, "error" => "Accout does not exist"]);
            exit;
        }

        $userid = read_jwt($jwt)['user'];

        $query = "UPDATE Users
        SET userPassword = '$password' WHERE userID = '$userid'";
        send_query($query, false, false, []);

        $query = "DELETE FROM `UserReset` WHERE `resetToken` = '$jwt'";
        send_query($query, false);

        echo json_encode(['success' => true, 'message' => "Password Reseted Successfully!"]);

    }
    else {
        echo "All fields are required!";
    }


?>