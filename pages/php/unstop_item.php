<?php

    include "check_login.php";

    if(isset($_POST['orderID']) && !empty($_POST['orderID'])) {
        $orderID = $_POST['orderID'];

        $query = "SELECT Stopped FROM Orders WHERE orderID = '$orderID'";
        $result = send_query($query, true, false, []);
        if($result) {
            $stopped = $result['Stopped'];
            if($stopped == '1') {
                $query = "UPDATE Orders SET `Stopped` = 0 WHERE `orderID` = '$orderID'";
                send_query($query, false, false, []);
                echo json_encode(['success' => true, 'message' => 'Item Unstopped successfully']);
            }
            else {
                echo json_encode(['success' => false, 'error' => 'Item already unstopped']);
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