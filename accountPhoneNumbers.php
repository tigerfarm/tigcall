<?php
if ($argc > 1) {
    $tokenPassword = $argv[1];
} else {
    $tokenPassword = htmlspecialchars($_REQUEST['tokenpassword']);
}
if ($tokenPassword == "") {
    echo '0 -- tokenpassword must be a GET parameter.';
    return;
}
$token_password = getenv("TOKEN_PASSWORD");
if ($token_password !== $tokenPassword) {
    // echo "0" . " Environment:" . $token_password . ": Parameter:" . $tokenPassword . ":";
    echo "0 -- invalid tokenpassword";
    return;
}

require __DIR__ . '/twilio-php-master/Twilio/autoload.php';
use Twilio\Rest\Client;
$client = new Client(getenv('ACCOUNT_SID'), getenv('AUTH_TOKEN'));
$result = $client->messages->read();
//
echo "+ List:" . "\xA";
foreach ($client->incomingPhoneNumbers->read() as $number) {
    echo "++ " . $number->phoneNumber . " " . $number->dateCreated->format('Y-m-d H:i') . "+ " . $number->friendlyName . "\xA";
}
?>