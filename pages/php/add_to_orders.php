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

if($categoryValue == "Others") {
    $category = $customcategorieValue;
}
else {
    $category = $categoryValue;
}

switch($typeValue){
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


$query = "INSERT INTO Orders (userID, orderID, Service, Rent Cargo, Categorie, deliveryProvider, placementTime, calculatedPrice, weight, Destination, From)
                VALUES (:userid, :orderid, :service, :rent_cargo, :category, :delivery, :placementTime, :price, :weight, :destination, :from)";

// $qeury = "INSERT INTO `Orders` (`userID`, `orderID`, `Service`, `Rent Cargo`, `Categorie`, `deliveryProvider`, `placementTime`, `calculatedPrice`, `weight`, `Destination`, `From`) VALUES ('2', '1WQ2E43R5YT6', 'QTQ', 'NO', 'Electronics', 'DHL', '1717071696', '55547', '15', 'China', 'Lebanon');";

$params = [
    "userid" => $userid,
    "orderid" => $randomString,
    "service"=> $serviceValue,
    "rent_cargo" => $rentCargoValue,
    "category"=> $category,
    "delivery"=> $deliveryValue,
    "placementTime"=> time(),
    "price"=>$PriceValue,
    "weight" => $weightValue,
    "destination" => $to,
    "from" => $from
];

send_query($query, true, false, $params);

echo "Order placed successfully!";
?>
