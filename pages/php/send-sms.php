<?php
    // 9.7514
    // 9.4774
    // 0.274
    error_reporting(E_ALL);
    ini_set('display_errors', 1);


    require "../../twilio-php-legacy/Services/Twilio.php";
    // require "../../twilio-php-8.1.1/src/Twilio/autoload.php";

    function send_sms($code, $to){

        $sid = "ACf837d1407e959d322c92af63df7a916c";
        $token = "be9656dc6dc1bcf9765d05c051f10a1a";

        $client = new Services_Twilio($sid, $token);
        $message = $client->account->messages->sendMessage(
        '+14239272158', // From a valid Twilio number
        "$to", // Text this number
        "Please use this code to verify: $code"
        );

    }
?>