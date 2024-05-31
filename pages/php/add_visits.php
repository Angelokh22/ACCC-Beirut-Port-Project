<?php 

    include "check_login.php";

    if(isset($_POST['IPaddress']) && !empty($_POST['IPaddress']) && $_SERVER['REQUEST_METHOD'] == 'POST'){

        $ipAddress = $_POST['IPaddress'];
        $currentDate = date("d-m-Y");


        $query = "SELECT * FROM Visits WHERE IPaddress = '$ipAddress' ORDER BY visitID DESC LIMIT 1;";
        $result = send_query($query, true, true, []);
        if($result) {
            $addedTime = date('d-m-Y', $result[0]['visitTime']);
            if($currentDate == $addedTime){
                echo json_encode(["success" => false]);
                exit;
            }
        }
        $query = "INSERT INTO Visits VALUES (NULL, :ip, :addTime);";
        send_query($query, false, false, ["ip" => $ipAddress, "addTime" => time()]);
        echo json_encode(["success" => true]);
    }

?>