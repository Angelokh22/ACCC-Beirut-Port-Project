<?php
include "tools.php";
if (isset($_POST['item_id'])) {
    $item_id = $_POST['item_id'];
    if (filter_var($item_id, FILTER_VALIDATE_INT)) {
        $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }
        $stmt = $mysqli->prepare("DELETE FROM items WHERE item_id = ?");
        
        $stmt->bind_param("i", $item_id);
        
        if ($stmt->execute()) {
            echo json_encode(["success" => true, "message" => "Item deleted successfully."]);
        } else {
            echo json_encode(["success" => false, "message" => "Failed to delete item."]);
        }
        $stmt->close();
        $mysqli->close();
    } else {
        echo json_encode(["success" => false, "message" => "Invalid item ID."]);
    }
} else {
    echo json_encode(["success" => false, "message" => "No item ID provided."]);
}
 ?>