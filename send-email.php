<?php

require('vendor/autoload.php');

use Mailgun\Mailgun;

# First, instantiate the SDK with your API credentials
$mg = Mailgun::create(getenv('MAILGUN_API_KEY'));

$email_data = [
  'from'    => getenv('FROM_EMAIL'),
  'to'      =>  getenv('EMAIL_TO'),
  'subject' => 'Mail Gun Email using Scheduler',
  //'text'    => 'It is so simple to send a message.'
  'html'    => 'Hi, <p> This email is for testing purpose. Email is sent via mailgun api by schedular ran on '.date('Y-m-d H:i:s').'. <br> You may ignore this email. </p> Regards<br>PHP DEMO Team'
];
# Now, compose and send your message.
# $mg->messages()->send($domain, $params);
$result = $mg->messages()->send(getenv('MAILGUN_DOMAIN'), $email_data);

?>