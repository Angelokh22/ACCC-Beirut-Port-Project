<?php


require "./twilio-php-legacy/Services/Twilio.php";

$sid = "ACf837d1407e959d322c92af63df7a916c";
$token = "5d98393ba1c0f093efd1877e80d2657f";

$client = new Services_Twilio($sid, $token);
$message = $client->account->messages->sendMessage(
'+14239272158', // From a valid Twilio number
"+9613875684", // Text this number
"Please use this code to verify: 1234"
);


?>