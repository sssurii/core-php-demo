<?php require_once('header.php');

use \Rollbar\Rollbar;
use \Rollbar\Payload\Level;

Rollbar::log(Level::error(), 'Page Not Found : '.$_SERVER['REQUEST_URI'].'');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>404 Page not found | Core PHP Demo</title>
</head>

<body style="color:red;">
    <h1>Error 404</h1>
    <p>Sorry! Page not found!</p>
</body>

</html>