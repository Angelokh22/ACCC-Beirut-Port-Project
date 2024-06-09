<?php

    include "tools.php";

    if(isset($_POST['email']) && !empty($_POST['email'])) {

        $email = $_POST['email'];


        if(!check_input($email)) {
            echo json_encode(["success" => false, "error" => "Incorrect Email!"]);
            exit;
        }


        $query = "SELECT * FROM NewsLetter WHERE letterEmail = '$email'";
        $result = send_query($query, true, false, []);
        if($result) {
            echo json_encode(["success" => false, "error" => "Email already Subscribed!"]);
            exit;
        }

        $query = "INSERT INTO NewsLetter VALUES (NULL, '$email')";
        send_query($query, false, false, []);

        echo json_encode(["success" => true, "message" => "Email Subscribed Successfully!"]);

    }


?>