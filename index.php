<?php require_once('header.php');  ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Core PHP Demo</title>
</head>

<body style="background: url(https://s3-eu-west-1.amazonaws.com/clientshare-docs/company_logo/949638008.png); color:red;">
    <h1><?php echo $redis->get('welcome-msg'); ?></h1>
    <a href="/add.php" title="Add record">Add some records</a>
</body>

</html>