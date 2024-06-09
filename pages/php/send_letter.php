<?php

    include "tools.php";
    include "send-email.php";


    if(isset($_POST['body']) && !empty($_POST['body'])) {

        $query = "SELECT letterEmail FROM NewsLetter";

        $result = send_query($query, true, true, []);

        if($result){
            foreach($result as $row) {
                $email = $row['letterEmail'];

                send_mail($email, "News Letter", $_POST['body']);

                
            }
            echo json_encode(["success" => true, "message" => "News Letter Sent!"]);
            exit;
        }
        else {
            echo json_encode(["success" => false, "error" => "No Emails found!"]);
        }
            }
    else {
        echo json_encode(["success"=> false, "error" => "Body needed!"]);
    }

?>