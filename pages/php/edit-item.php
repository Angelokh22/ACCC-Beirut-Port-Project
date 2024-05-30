<?php
include "tools.php"; 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    if (empty($id) || empty($name) || empty($price) || empty($description)) {
        echo json_encode(["success" => false, "message" => "All fields are required."]);
        exit;
    }

    if (!filter_var($id, FILTER_VALIDATE_INT)) {
        echo json_encode(["success" => false, "message" => "Invalid item ID."]);
        exit;
    }

    if (!is_numeric($price)) {
        echo json_encode(["success" => false, "message" => "Price must be a number."]);
        exit;
    }

    $query = "UPDATE Items SET itemName = :name, itemPrice = :price, itemDescription = :description WHERE itemID = :id";
    $params = [
        'name' => $name,
        'price' => $price,
        'description'=> $description,
        'id' => $id
    ];
    send_query($query, false, false, $params);
    echo json_encode(["success" => true, "message" => "Item updated successfully."]);
} else {
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
    
}
?>
