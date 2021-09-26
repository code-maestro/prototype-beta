<?php

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
require_once '../vendor/autoload.php';

use Twilio\Rest\Client;

// GITHUB student acc
// $sid = 'AC27f318bd622757b060a45f10658f90d0'; 
// $token ='1025ca67b99cd1bf16d8128ee7f01d31';

// AFRICASTALKING API KEY
// 50469e2297c06bbc43862a9df6b06f7f05550a81595901c8e5957e20484469bb //

// ell889lle student acc
// $sid = 'ACe202fb4950e338854ffc5838e2e723fa';
// $token = '3ffaacd498bc8346513426a72704fff0';

// $twilio = new Client($sid, $token);

// $message = $twilio->messages->create("+256703781554", ["body" => "Hi there", "from" => "+13236854720"]);

// print($message->sid);

// Your Account SID and Auth Token from twilio.com/console
$account_sid = 'ACe202fb4950e338854ffc5838e2e723fa';
$auth_token = '3ffaacd498bc8346513426a72704fff0';
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

// A Twilio number you own with SMS capabilities
$twilio_number = "+15017122661";

$client = new Client($account_sid, $auth_token);
$client->messages->create(
    // Where to send a text message (your cell phone?)
    '+15558675310',
    array(
        'from' => $twilio_number,
        'body' => 'I sent this message in under 10 minutes!'
    )
);