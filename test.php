<?php

// date_default_timezone_set('Asia/Beirut');
// echo date('Y/m/d h-i-s a', 1717177795);

include("./pages/php/tools.php");

// $query = "SELECT * FROM Ships WHERE shipStatus = 1;";
// $result = send_query($query, true, true, []);
// if($result) {
//     print_r($result);
    // $name = $result[0]['shipName'];
    // $cargo = $result[0]['shipCargo'];
    // date_default_timezone_set('Asia/Beirut');
    // $time =  date('d/m/Y h-i-s a', $result[0]['shipArrival']);

    // echo "<tr>
    //         <th>$name</th>
    //         <th>$cargo</th>
    //         <th>$time</th>
    //     </tr>";
// }

//echo send_query("SELECT count(*) FROM Orders WHERE `From` = 'Lebanon';", true,false,[])[0];

// echo send_query("SELECT count(*) FROM Orders WHERE COLUMN_NAME LIKE 'From%' ='Lebanon' AND TABLE_NAME = 'Orders';", true,false,[])[0];
 
$timestamp = 1717273223;
$timestampAfterThreeDays = strtotime('+3 days', $timestamp);
echo $timestampAfterThreeDays;

 ?>


