<?php

    include "check_login.php";

    $chartValue= [];
    $year = date("Y", time());

    for($i = 1; $i <= 12; $i ++){

        $query = "SELECT itemPrice FROM Items WHERE YEAR(FROM_UNIXTIME(itemAdded)) = $year AND MONTH(FROM_UNIXTIME(itemAdded)) = $i";
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