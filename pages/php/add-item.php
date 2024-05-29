<?php
include "tools.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $picture = $_FILES['picture'];
    
    $referer = $_SERVER['HTTP_REFERER'];
    if (parse_url($referer, PHP_URL_QUERY)) {
        $referer = parse_url($referer, PHP_URL_SCHEME) . '://' . parse_url($referer, PHP_URL_HOST) . parse_url($referer, PHP_URL_PATH);
    }

    if (empty($name) || empty($price) || empty($description) || empty($picture)) {
        // exit;
        header("Location: $referer?error_msg_add=All fields are required.");
    }

    if (!is_numeric($price)) {
        // exit;
        header("Location: $referer?error_msg_add=Price must be a number.");
    }
    // print_r($picture);
    $targetDir = "../../static/img/";
    $fileName = $picture["name"];
    $targetFile = $targetDir . basename($fileName);
    if (!move_uploaded_file($picture["tmp_name"], $targetFile)) {
        // exit;
        header("Location: $referer?error_msg_add=Failed to upload picture.");
    }

    session_start();
    $jwt = $_SESSION['Authorisation'];
    $result = send_query("SELECT userID from Sessions WHERE sessionToken = '$jwt'", true, false);
    $userid = $result['userID'];

    send_query("INSERT INTO Items VALUES (Null, $userid, '$name', '$price', '$description', '$fileName')", false);

    header("Location: $referer?success=added");

} else {
    header("Location: $referer?error_msg_add=Invalid request method.");
}
?>
