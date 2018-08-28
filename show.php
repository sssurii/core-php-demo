<?php
require_once 'header.php';
require_once 'connection.php'; 
$select =  pg_query($conn, "Select * from test_data");
$data = pg_fetch_all($select);
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Core PHP Demo</title>
</head>

<body >
    <?php 
    if(!empty($data)) { ?>
        <h2> Records Table </h2>
        <table border="1">
            <thead>
                <tr>
                    <th>
                        Sno.
                    </th>

                    <th>
                        Content
                    </th>

                    <th>
                        Created
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $key => $row) { ?>
                    <tr>
                        <th>
                            <?php echo ($key+1); ?>
                        </th>

                        <th>
                            <?php echo $row['content']; ?>
                        </th>

                        <th>
                            <?php echo $row['created_at']; ?>
                        </th>
                    </tr>  
                <?php } ?>
            </tbody>
        </table>
        <?php 
        echo '<a href="/add.php" title="Add record">Add record </a>';
    }
    else {
        echo 'No Record found! <a href="/add.php" title="Add record"> Add record </a>';
    } 
    ?>
</body>
</html>