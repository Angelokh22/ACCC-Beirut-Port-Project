<?php

// date_default_timezone_set('Asia/Beirut');
// echo date('Y/m/d h-i-s a', 1717177795);

include("./pages/php/tools.php");

$query = "SELECT * FROM Ships WHERE shipStatus = 1;";
$result = send_query($query, true, true, []);
if($result) {
    print_r($result);
    // $name = $result[0]['shipName'];
    // $cargo = $result[0]['shipCargo'];
    // date_default_timezone_set('Asia/Beirut');
    // $time =  date('d/m/Y h-i-s a', $result[0]['shipArrival']);

    // echo "<tr>
    //         <th>$name</th>
    //         <th>$cargo</th>
    //         <th>$time</th>
    //     </tr>";
}

?>
