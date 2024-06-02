<?php

    include "check_login.php";

    if(isset($_POST['orderID']) && !empty($_POST['orderID'])) {
        $orderID = $_POST['orderID'];

        $query = "SELECT Stopped FROM Orders WHERE orderID = '$orderID'";
        $result = send_query($query, true, false, []);
        if($result) {
            $stopped = $result['Stopped'];
            if($stopped == '0') {
                $query = "UPDATE Orders SET `Stopped` = 1 WHERE `orderID` = '$orderID'";
                send_query($query, false, false, []);
                echo json_encode(['success' => true, 'message' => 'Item Stopped successfully']);
            }
            else {
                echo json_encode(['success' => false, 'error' => 'Item already stopped']);
            }
        }
        else {
            echo json_encode(['success' => false, 'error' => 'Item does not exist']);
        }
    }
    else {
        echo json_encode(['success' => false, 'error' => 'method not allowed']);
    }

?>