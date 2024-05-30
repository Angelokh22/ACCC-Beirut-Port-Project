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
$query = "INSERT INTO Orders VALUES ($userid, '$randomString', '$serviceValue', '$rentCargoValue', '$category', '$deliveryValue', $time, $PriceValue, $weightValue, '$to', '$from')";

send_query($query, false, false, []);

echo "Order placed successfully!";

?>