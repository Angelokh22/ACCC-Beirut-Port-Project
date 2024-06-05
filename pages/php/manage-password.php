<?php

    // include "check_login.php";
    include "tools.php";
    include "send-email.php";


    if(
        isset($_POST["action"]) && $_POST['action'] == 'mail'
        &&
        isset($_POST['to']) && !empty($_POST['to'])
    )
    {

        $email = $_POST['to'];

        $query = "SELECT userID FROM Users WHERE userEmail = '$email'";
        $result = send_query($query, true, false, []);
        if($result) {
            $userid = $result['userID'];
            $jwt = create_jwt(json_encode(['user' => $userid, 'time' => time()]));
            
            $query = "INSERT INTO `UserReset` VALUES (NULL, '$JWT')";
            send_query($query, false);

            $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http';
            $host = $_SERVER['HTTP_HOST'];
            $port = $_SERVER['SERVER_PORT'];
            $url = $protocol . '://' . $host;
            if ($port != 80 && $port != 443) {
                $url .= ':' . $port;
            }
            $url .= "/pages/html/en/recovery_password.php?token=".$jwt;
            

            

        }
        else {
            echo "No results";
        }



    }
    else {
        echo "All fields are required!";
    }


?>