<?php

    include "check_login.php";

    $result = send_query("SELECT userID from Sessions WHERE sessionToken = '$jwt'", true, false);
    $userid = $result['userID'];

    $chartValue= [];
    $year = date("Y", time());

    for($i = 1; $i <= 12; $i ++){

        $income = 0;

        $query = "SELECT itemPrice FROM Items WHERE userID = '$userid' AND YEAR(FROM_UNIXTIME(itemAdded)) = $year AND MONTH(FROM_UNIXTIME(itemAdded)) = $i";
        $result = send_query($query, true, true, []);
        if($result) {
            foreach($result as $row) {
                $income += $row[0];
            }
            array_push($chartValue, $income);
        }
        else {
            array_push($chartValue, 0);
        }
    }

    echo json_encode(["success" => true, "value" => $chartValue]);


?>