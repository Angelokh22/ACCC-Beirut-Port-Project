<?php

// date_default_timezone_set('Asia/Beirut');
// echo date('Y/m/d h-i-s a', 1717177795);

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
 
// $timestamp = 1717273223;
// $timestampAfterThreeDays = strtotime('+30 days', $timestamp);
// echo $timestampAfterThreeDays;

// $year = date("m", time());
// echo $year;



include "check_login.php";
date_default_timezone_set('Asia/Beirut');
$timestamp = time();
echo $timestamp;

// date_default_timezone_set('Asia/Beirut');
// $itemAdded = 1717339295;
// $timestampAfteronemonth =strtotime('+1 month', $itemAdded);
// $itemAdded =  date('d/m/Y h-i-s a', 1717339295);
// $timestampA = date('d/m/Y h-i-s a',  $timestampAfteronemonth);
// $timestampA = date('d/m/Y h-i-s a',  $timestampAfteronemonth);

// echo $itemAdded .' '. $timestampA;
// $chartData = array(); 
// $year = date("Y", time());

// for ($i = 1; $i <= 12; $i++) {
//     $query = "SELECT itemPrice FROM Items WHERE YEAR (itemAdded) = $year AND MONTH (itemAdded) = $i";
//     echo "Debug: SQL query: $query<br>"; 
//     $result = send_query($query, true, false, []);

//     $totalPrice = 0; 
//     if ($result && isset($result[0]['total_price'])) {
//         $totalPrice = $result[0]['total_price']; 
//     }
//     echo "Debug: Total price for month $i: $totalPrice<br>"; 
//     $chartData[] = $totalPrice; 
// }


// $chartDataJSON = json_encode($chartData);
// echo "Debug: Chart data JSON: $chartDataJSON<br>"; 
?>
