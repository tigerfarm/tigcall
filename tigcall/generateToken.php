<?php
if ($argc > 1) {
    $tokenIdentity = $argv[1];
} else {
    $tokenIdentity = htmlspecialchars($_REQUEST["clientid"]);
}
if ($tokenIdentity == "") {
    echo "0 -- clientid must be an environment variable or GET parameter.";
    return;
}
if ($argc > 2) {
    $tokenPassword = $argv[2];
} else {
    $tokenPassword = htmlspecialchars($_REQUEST['tokenpassword']);
}
if ($tokenPassword == "") {
    echo '0 -- tokenpassword must be a GET parameter.';
    return;
}
$token_password = getenv("TOKEN_PASSWORD");
if ($token_password !== $tokenPassword) {
    echo "0" . " Environment:" . $token_password . ": Parameter:" . $tokenPassword . ":";
    echo "0 -- invalid tokenpassword";
    return;
}
// echo "+ tokenIdentity: " . $tokenIdentity . ", tokenPassword: " . $tokenPassword . "\n";
require __DIR__ . '/../twilio-php-master/Twilio/autoload.php';
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VoiceGrant;
// Required for all Twilio access tokens
$twilioAccountSid = getenv('ACCOUNT_SID');
$twilioApiKey = getenv('API_KEY');
$twilioApiSecret = getenv('API_KEY_SECRET');
$outgoingApplicationSid = getenv('VOICE_TWIML_APP_SID_CALL_CLIENT');
// Create access token, which we will serialize and sent to the client
// Token time to live (ttl):
//      360 seconds = 6 minutes (for testing)
//      3600 seconds = 60 minutes (1 hour)
//      36000 seconds = 600 hours
$token = new AccessToken(
    $twilioAccountSid,
    $twilioApiKey,
    $twilioApiSecret,
    3600,
    // 3600,
    // 36000,
    $tokenIdentity
);
$voiceGrant = new VoiceGrant();
$voiceGrant->setOutgoingApplicationSid($outgoingApplicationSid);
$voiceGrant->setIncomingAllow(true);
$token->addGrant($voiceGrant);
echo $token->toJWT();

// echo "\n"
?>


