<?php

require 'vendor/autoload.php';
require_once 'header.php';

use Mailgun\Mailgun;

// First, instantiate the SDK with your API credentials
$mg = Mailgun::create(getenv('MAILGUN_API_KEY'));

$email_data = [
  'from'    => getenv('FROM_EMAIL'),
  'to'      =>  getenv('EMAIL_TO'),
  'subject' => 'Mail Gun Email using Scheduler',
  'text'    => 'It is so simple to send a message. This email sent from '.getenv('ENVIROMENT')
  //'html'    => 'Hi, <p> This email is for testing purpose. Email is sent via mailgun api by schedular ran on '.date('Y-m-d H:i:s').'. <br> You may ignore this email. </p> Regards<br>PHP DEMO Team'
];
// Now, compose and send your message.
// $mg->messages()->send($domain, $params);
if(getenv('SEND_EMAIL') === true) {
    $result = $mg->messages()->send(getenv('MAILGUN_DOMAIN'), $email_data);
}

?>