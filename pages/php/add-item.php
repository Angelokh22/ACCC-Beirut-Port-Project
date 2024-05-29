<?php
include "tools.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $picture = $_FILES['picture'];

    if (empty($name) || empty($price) || empty($description) || empty($picture)) {
        echo json_encode(["success" => false, "message" => "All fields are required."]);
        exit;
    }

    if (!is_numeric($price)) {
        echo json_encode(["success" => false, "message" => "Price must be a number."]);
        exit;
    }
    $targetDir = "../../static/img/";
    $targetFile = $targetDir . random_int(100000, 999999) . basename($picture["name"]);
    if (!move_uploaded_file($picture["tmp_name"], $targetFile)) {
        echo json_encode(["success" => false, "message" => "Failed to upload picture."]);
        exit;
    }

    session_start();
    $jwt = $_SESSION['Authorisation'];
    $result = send_query("SELECT userID from Sessions WHERE sessionToken = '$jwt'", true, false);
    $userid = $result['userID'];

    $picture = explode('/', $targetFile)[4];
    $query = "INSERT INTO Items (userID, itemName, itemPrice, itemDescription, itemPicture) VALUES ($userid, '$name', $price, '$description', '$picture');";
    send_query($query, false, false);
    echo json_encode(["success" => true, "message" => "Item added successfully."]);

} else {
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
}
?>