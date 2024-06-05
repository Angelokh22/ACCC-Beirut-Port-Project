<?php

include "check_login.php";

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo json_encode(['success' => false, 'error' => 'method not allowed!']);
    exit;
}
if (
    isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'add'
    &&
    isset($_POST['name']) && !empty($_POST['name'])
    &&
    isset($_POST['email']) && !empty($_POST['email'])
    &&
    isset($_POST['phone']) && !empty($_POST['phone'])
    &&
    isset($_POST['password']) && !empty($_POST['password'])
) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $created = time();

    $query = "SELECT * FROM Users WHERE userEmail = '$email'";
    $result = send_query($query, true, false, []);
    if (!$result) {
        $query = "INSERT INTO Users (userRole, userName, userEmail, userPassword, userPhone, userStatus, userCreated)
            VALUES (2, '$name', '$email', '$password', '$phone', 1, $created)";
        send_query($query, false, false, []);
        
        $query = "SELECT userID FROM Users ORDER BY userID DESC LIMIT 1;";
        $userid = send_query($query, true, false, [])[0];
        
        echo json_encode(['success' => true, 'message' => 'User created successfully!', 'created' => date("Y/m/d", $created), "id" => $userid]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Email already in use.']);
    }
}
else if (
    isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'remove'
    &&
    isset($_POST['email']) && !empty($_POST['email'])
) {

    $email = $_POST['email'];

    $query = "SELECT * FROM Users WHERE userEmail = '$email'";
    $result = send_query($query, true, false, []);
    if ($result) {
        $query = "DELETE FROM Users WHERE userEmail = '$email'";
        send_query($query, false, false, []);
        echo json_encode(['success' => true, 'message' => 'User removed successfully!']);
    }
    else {
        echo json_encode(['success' => false, 'error' => 'User does not exist.']);
    }

}
else if (
    isset($_POST['action']) && !empty($_POST['action']) && $_POST['action'] == 'edit'
    &&
    isset($_POST['id']) && !empty($_POST['id'])
    &&
    isset($_POST['name']) && !empty($_POST['name'])
    &&
    isset($_POST['email']) && !empty($_POST['email'])
    &&
    isset($_POST['phone']) && !empty($_POST['phone'])
    &&
    isset($_POST['password'])
    &&
    isset($_POST['status']) && $_POST['status'] != ""
) {

    $userid = $_POST["id"];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $status = $_POST['status'];

    $query = "SELECT * FROM Users WHERE userID = '$userid'";
    $result = send_query($query, true, false, []);
    if (!$result) {
        echo json_encode(["success"=> false,"error"=> "User does not exist."]);
    }
    else {
        if(!empty($password)){
            $query = "UPDATE Users
            SET userName = '$name', userEmail = '$email', userPassword = '$password', userPhone = '$phone', userStatus = '$status'
            WHERE userID = '$userid'";
        }
        else {
            $query = "UPDATE Users
            SET userName = '$name', userEmail = '$email', userPhone = '$phone', userStatus = '$status'
            WHERE userID = '$userid'";
        }
        send_query($query, false, false, []);
        echo json_encode(["success"=> true,"message"=> "User edited successfully!"]);
    }

}
else {
    echo json_encode(["success" => false, 'error' => 'All fields are required.']);
}
