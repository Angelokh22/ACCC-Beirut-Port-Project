<?php include "tools.php";

$weightValue = $_POST['weightValue'];
$typeValue = $_POST['typeValue'];
$destinationValue = $_POST['destinationValue'];
$serviceValue = $_POST['serviceValue'];
$deliveryValue = $_POST['deliveryValue'];
$rentCargoValue = $_POST['rentCargoValue'];
$customcategorieValue = $_POST['customcategorieValue'];
$categoryValue = $_POST['categoryValue'];
$PriceValue = $_POST['finalPrice'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

$location = $latitude.",".$longitude;

$from = "";
$to = "";
$category = "";

if ($categoryValue == "Others") {
    $category = $customcategorieValue;
} else {
    $category = $categoryValue;
}

switch ($typeValue) {
    case 'Import':
        $to = "Lebanon";
        $from = $destinationValue;
        break;
    default:
        $to = $destinationValue;
        $from = "Lebanon";
}


$length = 12;
$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$randomString = '';

for ($i = 0; $i < $length; $i++) {
    $index = rand(0, strlen($characters) - 1);
    $randomString .= $characters[$index];
}

session_start();
$jwt = $_SESSION['Authorisation'];
$result = send_query("SELECT userID from Sessions WHERE sessionToken = '$jwt'", true, false);
$userid = $result['userID'];

$time = time();
$departTime = strtotime('+2 days', $time);
$ArrivalTime = strtotime('+5 days', $time);

$query = "INSERT INTO `Orders` VALUES ('$userid', '$randomString', '$serviceValue', '$rentCargoValue ', '$categoryValue', '$deliveryValue', '$time', '$PriceValue', '$weightValue', '$to', '$from', '$ArrivalTime', '$departTime', '0');";
send_query($query, false, false, []);

$status = rand(0, 5);
$query = "INSERT INTO `Tracking` VALUES ('$randomString', '$departTime', '$ArrivalTime', '$location', '$status')";
send_query($query, false, false, []);

echo "Order placed successfully!";

?>