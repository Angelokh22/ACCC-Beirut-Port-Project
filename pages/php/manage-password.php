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
            
            echo $jwt;
            // $query = "INSERT INTO `UserReset` VALUES (NULL, `$JWT`, NULL)";
            // send_query($query, false);

            // $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http';
            // $url = $_POST['root'];
            // $url .= "/pages/html/en/recovery_password.php?token=".$jwt;

            // send_mail($email,"Password Recovery Email", $url);
            

            

        }
        else {
            echo "No results";
        }



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
            echo json_encode(["success" => false, "error" => "password incorrect"]);
            exit;
        }

        if($password != $confirmPassword) {
            echo json_encode(["success"=> false, "error" => ""]);
        }

    }
    else {
        echo "All fields are required!";
    }


?>