<?php 

if(
    isset($_POST['trackingid']) && $_POST['trackingid'] != ""
){
    include ("check_login.php");

    $orderid = $_POST['trackingid'];

    

// Define the pattern
$pattern = "/^[A-Z]{3}[0-9]{9}$/";

// Check if the tracking number matches the pattern
if (preg_match($pattern, $orderid)) {
     $query1 = "SELECT * FROM Tracking WHERE orderID = '$orderid'";
    $query2 = "SELECT * FROM Orders WHERE orderID = '$orderid'";

    $result1 = send_query($query1, true, false);
    $result2 = send_query($query2, true, false);
    
    if($result1 && $result2){
        $deltime = $result1["ariveTime"];
        $status = $result1["status"];
        $shipmentType = $result2["shipmentType"];
        $location = $result1["location"];
    }
    else {
        echo "NO";
    }
} else {
    echo "NO";
}


   
}

?>
