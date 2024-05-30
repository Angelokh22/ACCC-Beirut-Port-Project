<?php
include "tools.php";

if (isset($_POST['item_id'])) {
    $item_id = $_POST['item_id'];
    if (filter_var($item_id, FILTER_VALIDATE_INT)) {
        

        $query = "SELECT * FROM Items WHERE itemID = :itemid";
        $params = [
            "itemid" => $item_id
        ];

        $result = send_query($query, true, false, $params);

        if($result){

            $query = "DELETE FROM Items WHERE itemID = :itemid";
            $params = [
                "itemid"=> $item_id
            ];
            send_query($query, false, false, $params);
            
            echo json_encode(["success" => true, "message" => "Item deleted successfully."]);
        }
        else {
            echo json_encode(["success" => false, "message" => "Invalid item ID."]);
        }
    }
    else {
        echo json_encode(["success" => false, "message" => "No item ID provided."]);

    }
}
?>
