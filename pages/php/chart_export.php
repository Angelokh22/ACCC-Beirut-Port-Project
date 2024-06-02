<?php

    include "check_login.php";

    $chartValue= [];
    $year = date("Y", time());

    for($i = 1; $i <= 12; $i ++){

        $query = "SELECT count(*) FROM Orders WHERE `From` = 'Lebanon' AND YEAR(FROM_UNIXTIME(placementTime)) = $year AND MONTH(FROM_UNIXTIME(placementTime)) = $i";
        $result = send_query($query, true, false, []);
        if($result) {
            array_push($chartValue, $result[0]);
        }
        else {
            array_push($chartValue, 0);
        }
    }

    echo json_encode(["success" => true, "value" => $chartValue]);


?>