<?php

    include "tools.php";

    if(isset($_POST['fname']) && $_POST['fname'] != ""
       &&
       isset($_POST['lname']) && $_POST['lname'] != ""
       &&
       isset($_POST['email']) && $_POST['email'] != ""
       &&
       isset($_POST['phone']) && $_POST['phone'] != "" 
       &&
       isset($_POST['message']) && $_POST['message'] != ""  
    )
    {

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];


        $query = "INSERT INTO Contacts (`contactFName`, `contactLName`, `contactEmail`, `contactPhone`, `contactMessage`)
                  VALUES (:cfname, :clname, :cemail, :cphone, :cmessage)";

        send_query($query, false, false, ["cfname" => $fname, "clname" => $lname, "cemail" => $email, "cphone" => $phone, "cmessage" => $message]);

        echo json_encode(['success' => true, 'message' => 'Message sent successfully!']);

    }
    else{
    echo json_encode(['success' => false, 'error' => 'Some parameters are required!']);
    }
?>