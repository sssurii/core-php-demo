<?php
require_once 'header.php';
require_once 'connection.php'; 
$insert = false;
if(isset($_POST['submit']) && !empty($_POST['content'])) {
    $insert = pg_query($conn, "INSERT INTO test_data (content, created_at) VALUES('".strip_tags($_POST['content'])."', '".date('Y-m-d H:i:s')."')");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Core PHP Demo</title>
</head>
<body >
    <?php 
    if($insert) {
        echo 'Record added successfully! <br> <a href="/show.php" title="Show"> Check it</a>';
    }
    ?>
    <form action="" method="POST">
        <input type="text" name="content" placeholder="Add something here">
        <button type="submit" name="submit" value="submit">Save</button>
    </form>
</body>

</html>