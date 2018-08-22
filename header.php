<?php

require('vendor/autoload.php');

use Dotenv\Dotenv;
use \Rollbar\Rollbar;
use \Rollbar\Payload\Level;

//load env variables
$dotenv = new Dotenv(__DIR__);
$dotenv->load();

Rollbar::init(
    array(
        'access_token' => getenv('ROLLBAR_ACCESS_TOKEN'),
        'environment' => 'development'
    )
);
