<?php

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
require_once '../vendor/autoload.php';

use Twilio\Rest\Client;

// Find your Account SID and Auth Token at twilio.com/console
// and set the environment variables. See http://twil.io/secure
$sid = 'AC27f318bd622757b060a45f10658f90d0'; 
$token ='1025ca67b99cd1bf16d8128ee7f01d31'; 

$twilio = new Client($sid, $token);

$message = $twilio->messages->create("+256703781554", ["body" => "Hi there", "from" => "+13236854720"]);

print($message->sid);