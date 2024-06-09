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
        $token = "7226513140fa667df42ffd42cce34e08";

        $client = new Services_Twilio($sid, $token);
        $message = $client->account->messages->sendMessage(
        '+14239272158', // From a valid Twilio number
        "$to", // Text this number
        "Please use this code to verify: $code"
        );

        // $client = new Twilio\Rest\Client($sid, $token);

        // // Use the Client to make requests to the Twilio REST API
        // $client->messages->create(
        //     // The number you'd like to send the message to
        //     "$to",
        //     [
        //         // A Twilio phone number you purchased at https://console.twilio.com
        //         'from' => '+14239272158',
        //         // The body of the text message you'd like to send
        //         'body' => "Please use this code to verify: $code"
        //     ]
        // );
    }

    // send_sms("1234", "+9613875684");

?>