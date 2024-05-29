<?php 

if(
    isset($_POST['trackingid']) && $_POST['trackingid'] != ""
){
    include ("check_login.php");

    $orderid = $_POST['trackingid'];

    

// Define the pattern
$pattern = "/^[A-Z0-9]{12}$/";

// Check if the tracking number matches the pattern
if (preg_match($pattern, $orderid)) {
    $query1 = "SELECT * FROM Tracking WHERE orderID = '$orderid'";
    $query2 = "SELECT * FROM Orders WHERE orderID = '$orderid'";

    $result1 = send_query($query1, true, false);
    $result2 = send_query($query2, true, false);
    
    if($result1 && $result2){
        $deltime = $result1["ariveTime"];
        $statusIndex = $result1["status"];
        $location = $result1["location"];
        $shipmentType_3ch = $result2["shipmentType"];
        $shipmentType = "";
        $deliveryProvider = $result2["deliveryProvider"];
        $status = "";
        $destination = $result2["Destination"];
        $from = $result2["From"];
        
        switch( $statusIndex ) {
            case '0': $status = "Confirmed Order"; break;
            case '1': $status = "Processing Order"; break;
            case '2': $status = "Security Check"; break;
            case '3': $status = "Product Dispatched"; break;
            case '4': $status = "Store House"; break;
            case '5': $status = "Product Delivered"; break;
            default: $status = "Default";
        }

        switch( $shipmentType_3ch ) {
            case 'QTQ': $shipmentType = "Quay To Quay"; break;
            case 'DTD': $shipmentType = "Door To Door"; break;
            case 'DTQ': $shipmentType = "Door To Quay"; break;
            case 'QTD': $shipmentType = "Quay To Door"; break;
            default: $shipmentType = "Default";
        }


        echo json_encode(array(
            "trackingNumber" => $orderid,
            "deleveryTime" => date("Y/m/d", $deltime),
            "statusIndex" => $statusIndex,
            "status" => $status,
            "location"=> $location,
            "shipmentType"=> $shipmentType,
            "deliveryProvider" => $deliveryProvider,
            "destination" => $destination,
            "from" => $from
        ));
    }
    else {
        echo "NO";
    }
} else {
    echo "NO";
}


   
}

?>
