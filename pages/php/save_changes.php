<?php


    if(
        isset($_POST['fullname']) && $_POST['fullname'] != ""
        &&
        isset($_POST['email']) && $_POST['email'] != ""
        &&
        isset($_POST['city']) && $_POST['city'] != ""
        &&
        isset($_POST['town']) && $_POST['town'] != ""
        &&
        isset($_POST['postalCode']) && $_POST['postalCode'] != ""
        &&
        isset($_POST['adresse1']) && $_POST['city'] != ""
        &&
        isset($_POST['phone']) && $_POST['phone'] != ""
    )
    {

        include "check_login.php";



        session_start();

        $jwt = $_SESSION["Authorisation"];
        if(!$jwt){
            header("Location:../../../../index.php");
        }


        $session_result = send_query("SELECT * FROM Sessions WHERE sessionToken = '$jwt'", true, false);
        if(!$session_result){
            session_destroy();
            header("Location:../../../../index.php");
        }
        $userid = $session_result[0]['userID'];



        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $city = $_POST["city"];
        $town = $_POST["town"];
        $postalcode = $_POST["postalCode"];
        $adresse1 = $_POST["adresse1"];
        $adresse2 = Null;
        

        if(isset($_POST['adresse2']) && $_POST['adresse2'] != ""){
            $adresse2 = $_POST["adresse2"];
        }

        $adresse_result = send_query("SELECT * FROM Adresses WHERE userID = $userid", true, false);
        
        if($adresse_result){
            send_query("UPDATE Adresses SET city = '$city', adresse = '$adresse1', adresse2 = '$adresse2', postalCode = '$postalcode' WHERE userID = '$userid'", false);
        }

        else {
            send_query("INSERT INTO Adresses (userID, city, town, adresse, adresse2, postalCode) VALUES ('$userid', '$city', '$town', '$adresse1', '$adresse2', '$postalcode')", false);
        }

        send_query("UPDATE Users SET userName = '$fullname', userEmail = '$email', userPhone = '$phone' WHERE userID = '$userid'", false);
        
        echo "OK";

    }
    else {
        echo "NO";
    }



?>