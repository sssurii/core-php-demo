<?php

require('vendor/autoload.php');

use \Rollbar\Rollbar;
use \Rollbar\Payload\Level;

Rollbar::init(
    array(
        'access_token' => getenv('ROLLBAR_ACCESS_TOKEN') ? getenv('ROLLBAR_ACCESS_TOKEN') : 'd378ffdb962f447ab74740c04f1bdf85',
        'environment' => 'development'
    )
);
